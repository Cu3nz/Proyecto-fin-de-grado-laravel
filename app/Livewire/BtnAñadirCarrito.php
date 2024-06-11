<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BtnAñadirCarrito extends Component
{

    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addProduct()
    {
        //? Si no esta logueado el usuario, cuando pulse en el boton del carrito, lo mandara al login
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $product = Product::findOrFail($this->product);
        //dd($product);
        $userId = Auth::id();
        //dd($userId);
        $primeraImagen = $product->primeraImagen->url_imagen;
        //dd($primeraImagen);
        $ImagenMostradaCart = Storage::url($primeraImagen); //? Esta es la imagen que se muestra en el carrito
        //dd($ImagenMostradaCart);
        $iva = 0.21;

        $productoEnCarrito = ShoppingCart::where('user_id', $userId)
                                         ->where('product_id', $product->id)
                                         ->first();
        //dd($productoEnCarrito);

        if ($productoEnCarrito) { //* Si el producto esta ya en el carrito
            $productoEnCarrito->increment('cantidad'); //? Incremento la cantidad en 1
            $productoEnCarrito->total = ($productoEnCarrito->cantidad * $productoEnCarrito->precio_unitario) * (1 + $iva); //? Actualizo el precio total del producto con el iva ya incluido
            $productoEnCarrito->save(); //? Lo guardo en la base de datos
        } else { // Si no esta agregado en el carrito (Es la primera vez que se añade)
            $total = ($product->precio * 1) * (1 + $iva); //? Calculo el precio total del producto con el iva ya incluido y lo agrego al carrito

            ShoppingCart::create([
                'product_id' => $product->id,
                'nombre_producto' => $product->nombre,
                'precio_unitario' => $product->precio,
                'codigo_articulo' => $product->codigo_articulo,
                'cantidad' => 1,
                'email_usuario' => auth()->user()->email,
                'imagen_producto' => $ImagenMostradaCart,
                'total' => number_format($total, 2),
                'user_id' => auth()->user()->id,
            ]);
        }

        $this->dispatch('addProduct', 'Producto ' . $product -> nombre  . ' añadido al carrito.'); //? Emito el mensaje de que fue añadido al carrito
        $this->dispatch('productAdded'); //! Evento que actualiza el carrito, esta definido en CartLivewire.php
    }

    public function render()
    {
        return view('livewire.btn-añadir-carrito');
    }
}
