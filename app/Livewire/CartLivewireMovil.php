<?php

namespace App\Livewire;

use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\On;
use Livewire\Component;

class CartLivewireMovil extends Component
{

    public $productosEnCarrito;

    protected $listeners = [
        'refrescarCarrito' => 'mount',
        'productAdded' => 'refrescarCarrito'
    ];

    public function mount()
    {
        $this->refrescarCarrito();
    }

    public function refrescarCarrito()
    {
        $userId = Auth::id();
        $this->productosEnCarrito = ShoppingCart::where('user_id', $userId)->get();
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
        $this -> refrescarCarrito();
    } 
    

    //* BORRADO CON CONFIRMACION

    /**
     * @param ShoppingCart $product //? Recibes el producto que quieres eliminar
     * 
     * * $this -> dispatch('confirmarDeleteCarrito' , $product -> id); //todo Este evento, lo va a escucahr app.blade.php y es el que va a abrir la modal, ya que la modal recibe el evento confirmarDeleteCarrito
     * 
     * !!IMPORTANTE, ESTE EVENTO TIENE QUE ESTAR DEFINIDO EN EL BOTON DE BORRADO DEL CARRITO DEFINIDO CON EL EVENTO WIRE:CLICK="PEDIRCONFIRMACION({{ $ITEM->ID }})" 
     * 
     * * <button wire:click="pedirConfirmacion({{ $item->id }})" class="text-red-500 mr-7 mb-10">
     */

    /*  public function pedirConfirmacion(ShoppingCart $product){ 
        //dd($product);
        $this -> dispatch('confirmarDeleteCarrito' , $product -> id); //todo Este evento, lo va a escucahr app.blade.php
    }
    
    #[On('deleteConfirmado')]
    public function removeProduct($productId)
    {
        $productoEnCarrito = ShoppingCart::findOrFail($productId);
        //dd($productoEnCarrito);
        $productoEnCarrito->delete();
        
        $this->dispatch('productRemoved', 'Se ha eliminado el producto ' . $productoEnCarrito -> nombre_producto . ' del carrito');
        $this -> refrescarCarrito();
    } */

    //* FIN BORRADO CON CONFIRMACION
    
    public function confirmarVaciarCarritoMovil(User $user){

        $this -> dispatch('confirmarVaciarCarritoMovil' , $user -> id); //todo Este evento, lo va a escucahr app.blade.php

    }


    #[On('vaciarCarritoConfirmado')]
    public function vaciarCarrito()
    {
        $userId = Auth::id();
        ShoppingCart::where('user_id', $userId)->delete();

        $this->dispatch('vaciarCarrito', 'Se ha vaciado el carrito');
        $this->dispatch('refrescarCarrito');
    }

    public function render()
    {
        return view('livewire.cart-livewire-movil');
    }
}
