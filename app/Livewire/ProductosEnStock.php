<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductosEnStock extends Component
{

    use WithPagination;

    public $ordenar_por = 'precio_asc'; //? Por defecto se ordena por precio ascendente
    public $categoria_id; //? Para filtrar por categoria



    public function render()
    {

        $categorias = Category::with('children')->where('es_padre', true)->get(); //* Obtengo todas las categorias que son padre

        $query = Product::where('stock', '>', 0)->with('primeraImagen', 'category'); //* Obtengo todos los productos que tengan stock mayor a 0

        if ($this->categoria_id) { //? Si se ha seleccionado una categoria
            $query->where('category_id', $this->categoria_id); //? Filtra los productos por la categoria seleccionada
        }


        if ($this->ordenar_por) { //? Si se selecciona precio ascendente, la variable que ordena, se define a asc (de menor a mayor)
            if ($this->ordenar_por == 'precio_asc') {
                $query->orderBy('precio', 'asc');
                //? Si se selecciona precio descendente, la variable que ordena, se define a desc (de mayor a menor)
            } elseif ($this->ordenar_por == 'precio_desc') {
                $query->orderBy('precio', 'desc');
            }
        }


        $productos = $query->paginate(12); //? Paginamos los productos de 12 en 12

        return view('livewire.productos-en-stock' , compact('productos', 'categorias'));
    }
}
