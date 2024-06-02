<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BotonDeLike extends Component
{

    public $product;
    public $esGustado;

    /**
     * todo El metodo mount se ejecuta cuando el componente Livewire es inicializado.
     * 
     * @param Product $product - El modelo de producto que será gestionado por el componente.
     * 
     * Este método sirve para:
     * * 1. Inicializar el componente con los datos del producto.
     * * 2. Determinar si el usuario autenticado ha dado "like" al producto.
     * 
     * ? - $this->product: Almacena el producto pasado al componente.
     * ? - $this->esGustado: Almacena un booleano indicando si el usuario autenticado ha dado "like" al producto.
     */

    public function mount(Product $product)
    {
        $this->product = $product; //* Almacena el producto pasado al componente

        //* Verifico que el usuario se haya registrado Y que el producto usuario autenticado haya dado like al producto
        $this->esGustado = Auth::check() && Auth::user()->likedProducts->contains($product->id);
    }

    public function alternarLikes()
    {
        if (!Auth::check()) { //! Si el usuario no esta registrado
            return redirect()->route('login'); // Redirigir al login si el usuario no está autenticado
        }

        $user = Auth::user(); //* Almacenamos el usuario autenticado

        if ($user->likedProducts()->where('product_id', $this->product->id)->exists()) { //* Si el usuario ha dado like al producto
            $user->likedProducts()->detach($this->product->id); // Eliminamos el like del producto
            $this->esGustado = false; // Cambiamos el estado del like a false para que no este el boton pulsado
        } else { //* Si el usuario no ha dado like al producto 
            $user->likedProducts()->attach($this->product->id); // Añadimos el like al producto
            $this->esGustado = true; // Cambiamos el estado del like a true para que este el boton pulsado y de color rojo
        }
    }

    public function render()
    {
        return view('livewire.boton-de-like');
    }
}
