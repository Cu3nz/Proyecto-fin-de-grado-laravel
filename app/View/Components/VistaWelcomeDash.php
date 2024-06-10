<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VistaWelcomeDash extends Component
{

    public $anime; 
    public $KimetsuNoYaiba;
    public $nuevos;
    public $ShingekinoKyojin;
    public $categorias;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {


        //todo Mostrar las 3 ultimas categorias padre en la vista welcome y dasboardh
        $this -> categorias = Category::orderBy('id', 'desc') -> where('es_padre' , '1')->take(3)->get();


        $this->anime = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.nombre', 'SpongeBob SquarePants')
        ->select('products.*', 'categories.nombre as category_name', 'categories.id as category_id')
        ->with('primeraImagen') // Obtiene la primera imagen de cada producto
        ->orderby('products.id', 'desc')
        ->get();

        $this->KimetsuNoYaiba = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.nombre', 'Kimetsu No Yaiba')
        ->select('products.*', 'categories.nombre as category_name', 'categories.id as category_id')
        ->with('primeraImagen') // Obtiene la primera imagen de cada producto
        ->orderby('products.id', 'desc')
        ->get();

        $this -> nuevos = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.nombre as category_name' , 'categories.id as category_id')
        ->where('categories.nombre', 'Nuevos')
         /* ->where('products.estado', 'NO DISPONIBLE') */
        ->with('primeraImagen') //? Obtiene la primera imagen de cada producto
        /* ->orderby('products.id' , 'desc') */
        ->get();

        $this->ShingekinoKyojin = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.nombre', 'Shingeki no Kyojin')
        ->select('products.*', 'categories.nombre as category_name', 'categories.id as category_id')
        ->with('primeraImagen') // Obtiene la primera imagen de cada producto
        ->orderby('products.id', 'desc')
        ->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vista-welcome-dash');
    }
}
