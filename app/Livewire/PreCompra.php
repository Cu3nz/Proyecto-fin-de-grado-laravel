<?php

//! MODIFICADO CON LA CONICION DE QUE EL PRODUCTO NO PUEDA TENER UNA CANTIDAD MENOR A 1 2 de junio 
namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class PreCompra extends Component
{
    public function render()
    {
        $userId = Auth::id(); //? Recuper el id del usuario registrado acutalmente
        $productosEnCarrito = ShoppingCart::where('user_id' , $userId) -> get();  //? Recupero todos los productos que esten en el carrito del usuario autenticado gracias a su id de la tabla users

        return view('livewire.pre-compra' , compact('productosEnCarrito'));
    }



    public function aumentarStock($productoIdRegistro) //* Le paso el id incrementable del resgistro de la tabla shopping_carts
    {
        //dd($productoIdRegistro);

        $producto = ShoppingCart::findOrFail($productoIdRegistro); //? Busco el producto en la tabla shopping_carts mediante el id del registro (el incrementable)

        $productoTabla = Product::findOrFail($producto -> product_id);

        //dd($productoTabla);

        $iva = 0.21;
        $producto->increment('cantidad'); //? Incremento la cantidad del producto en 1 cuando se pulsa en el boton de aumentar stock
        //? Calculamos el total (precio total del carrito sumando el precio de todos los productos)
        $producto->total = ($producto->cantidad * $producto->precio_unitario) * (1 + $iva);
        $producto->save(); //? Guardamos los cambios en la base de datos
        $this->dispatch('productAdded'); //! PARA QUE SE RECARGUE EL CARRITO

    }


    public function disminuirStock ($productoIdRegistro)
    {
        //dd($productoIdRegistro);

        $producto = ShoppingCart::findOrFail($productoIdRegistro); //? Busco el producto en la tabla shopping_carts mediante el id del registro (el incrementable)

        //dd($producto);

        //! Si la cantidad del producto es 1, no se puede disminuir más y me salta el siguiente mensaje
        if ($producto->cantidad <= 1) {
            session()->flash('error', 'ERROR: La cantidad del producto ' . $producto -> nombre_producto .  ' no puede ser menor a 1.');
            return;
        }

        $producto->decrement('cantidad'); //? Decremento la cantidad del producto en 1 cuando se pulsa en el boton de disminuir stock

        $iva = 0.21;
        $producto->total = ($producto->cantidad * $producto->precio_unitario) * (1 + $iva);
        $producto->save(); //? Guardo los cambios en la base de datos
        $this->dispatch('productAdded'); //! PARA QUE SE RECARGUE EL CARRITO 

    }

    public function confirmarVaciarCarritoPreCompra(User $user){

        $this -> dispatch('confirmarVaciarCarritoPreCompra' , $user -> id); //todo Este evento, lo va a escucahr app.blade.php

    }

    #[On('vaciarCarritoConfirmadoPreCompra')]
    public function vaciarCarrito()
    {
        $userId = Auth::id();
        ShoppingCart::where('user_id', $userId)->delete();

        $this->dispatch('vaciarCarrito', 'Se ha vaciado el carrito');
        $this->dispatch('refrescarCarrito');
    }

    public function removeProduct($productId)
    {
        $productoEnCarrito = ShoppingCart::findOrFail($productId);
        //dd($productoEnCarrito);
        
        if (Gate::denies('removeProductCarrito', $productoEnCarrito)) {
            $this -> dispatch('PoliticaBorradoDenegada', 'No puedes eliminar un producto que no es tuyo');
            return; //? Si no se cumple la politica de borrado, no se elimina el producto
        }

        $productoEnCarrito->delete();
        
        $this->dispatch('productRemoved', 'Se ha eliminado el producto ' . $productoEnCarrito -> nombre_producto . ' del carrito');
        $this->dispatch('refrescarCarrito');
    } 



}
