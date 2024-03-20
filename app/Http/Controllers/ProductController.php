<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    // Obtener todas las categorías que son padres
    $categoriasPadres = Category::where('es_padre', true)->get(['id', 'nombre']);

    // Para cada categoría padre, cargar sus subcategorías
    foreach ($categoriasPadres as $categoriaPadre) {
        $categoriaPadre->subcategorias = Category::where('category_padre_id', $categoriaPadre->id)->get();
    }

    //dd($categoriasPadres); //? Revisar para ver si imprime correctamente las categorías padres y sus subcategorías

    return view('products.create', compact('categoriasPadres'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
