<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ListaVerLikes extends Component
{
    use WithPagination;
    public string $buscar = "";

    //todo Editar para que solo muestre los productos que estan disponibles y que claramente le haya dado like el usuario

    public function render()
{
    $misLikes = Product::whereHas('likeDeUsers', function ($q) {
        $q->where('user_id', auth()->id());
    })
    ->join('product_user_likes', 'product_user_likes.product_id', '=', 'products.id')
    ->where('product_user_likes.user_id', auth()->id())
    //->where('products.estado', 'DISPONIBLE')
    ->where(function($query) {
        if (!empty($this->buscar)) {
            $query->where('products.nombre', 'like', '%'.$this->buscar.'%')
                  ->orWhereHas('category', function ($q) {
                      $q->where('nombre', 'like', '%'.$this->buscar.'%');
                  });
        }
    })
    ->with('primeraImagen')
    ->select('products.*') //? Selecciono todos los campos de la tabla de productos
    ->orderBy('product_user_likes.id', 'desc') //? Ordenamos los resultados por el id de la tabla pivote  de forma descendente para mostrar primero el ultimo producto al cual le ha dado like.
    ->distinct() //! Para que no se repitan los productos
    ->paginate(9);


    return view('livewire.lista-ver-likes', compact('misLikes'));
}

    


    public function updatingBuscar()
    {
        $this->resetPage();
    }

}
