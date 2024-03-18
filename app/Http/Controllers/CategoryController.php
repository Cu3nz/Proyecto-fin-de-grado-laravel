<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // todo Esta consulta la hago para coger el id y el nombre de las categorias padre en este caso, que son Dibujos animados y Anime y mostraslas en el select del formulario de creacion de categorias
        $categoriasPadres = Category::select('id', 'nombre')
            ->where('es_padre', true)
            ->get();
        return view('categorias.nuevo', compact('categoriasPadres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request -> validate([
            'nombre' => ['required' , 'string' , 'min:3' , 'unique:categories,nombre'],
            'tipo' => ['required' , 'in:padre,hijo'],
            'category_padre_id' => ['nullable' , 'exists:categories,id'],
        ]);

        if ($request->input('tipo') === 'padre') {
           
            //? Crear una categoria padre
            Category::create([
                'nombre' => $request->input('nombre'),
                'category_padre_id' => null,
                'es_padre' => true, //! Importante añadir esto para que sepa que es una categoria padre
            ]);
        } else {
            // Crear una subcategoria
            Category::create([
                'nombre' => $request->input('nombre'),
                'category_padre_id' => $request->input('category_padre_id'),
            ]);
        }

        return redirect() -> route('Category.principal') -> with('mensaje' , 'Categoria creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        $categoriasPadres = Category::select('id', 'nombre')
        ->where('es_padre', true)
        ->get();
        return view('categorias.update', compact('category' , 'categoriasPadres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $request -> validate([
            'nombre' => ['required' , 'string' , 'min:3' , 'unique:categories,nombre,' . $category->id],
            'tipo' => ['required' , 'in:padre,hijo'],
            'category_padre_id' => ['nullable' , 'exists:categories,id'],
        ]);

        if ($request->input('tipo') === 'padre') {
           
            
            $category -> update([
                'nombre' => $request->input('nombre'),
                'category_padre_id' => null,
                'es_padre' => true, //! Importante añadir esto para que sepa que es una categoria padre
            ]);
        } else {
            
            $category -> update([
                'nombre' => $request->input('nombre'),
                'category_padre_id' => $request->input('category_padre_id'),
            ]);
        }

        return redirect() -> route('Category.principal') -> with('mensaje' , 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('Category.principal')->with('mensaje', 'Categoria eliminada correctamente');
    }
}
