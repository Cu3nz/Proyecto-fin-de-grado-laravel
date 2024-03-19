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
        // todo Validaciones para los dos primeros campos del formulario
        $reglas = [
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre'],
            'tipo' => ['required', 'in:padre,hijo'], //? Solo se puede seleccionar estos dos tipos, si se cambia el nombre dara un error
        ];
    
        //todo Si el tipo es hijo se añadira el select para seleccionar las categorias que son padres por lo tanto, añadimos la validacion para el campo category_padre_id
        if ($request->input('tipo') === 'hijo') {
            $reglas['category_padre_id'] = ['required', 'exists:categories,id'];
        }
    
        //* Validamos con las reglas seleccionadas Validar la solicitud con las reglas definidas
        $request->validate($reglas);
    
        // ? Si el tipo es padre, creamos la categoria con el campo category_padre_id a null y es_padre a true
        if ($request->input('tipo') === 'padre') {
            Category::create([
                'nombre' => $request->nombre,
                'category_padre_id' => null,
                'es_padre' => true,
            ]);
        } else { // ? Si el tipo es hijo, creamos la categoria con el campo category_padre_id que nos llegue del formulario
            Category::create([
                'nombre' => $request->nombre,
                'category_padre_id' => $request->input('category_padre_id'),
            ]);
        }
    
        // Redirigir con mensaje de éxito
        return redirect()->route('Category.principal')->with('mensaje', 'Categoría creada correctamente');
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
        // todo Validaciones para los dos primeros campos del formulario
        $reglas = [
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre,'.$category -> id],
            'tipo' => ['required', 'in:padre,hijo'], //? Solo se puede seleccionar estos dos tipos, si se cambia el nombre dara un error
        ];
    
        //todo Si el tipo es hijo se añadira el select para seleccionar las categorias que son padres por lo tanto, añadimos la validacion para el campo category_padre_id
        if ($request->input('tipo') === 'hijo') {
            $reglas['category_padre_id'] = ['required', 'exists:categories,id'];
        }
    
        //* Validamos con las reglas seleccionadas Validar la solicitud con las reglas definidas
        $request->validate($reglas);
    
        // ? Si el tipo es padre, actualizamos la categoria con el campo category_padre_id a null y es_padre a true
        if ($request->input('tipo') === 'padre') {
            $category -> update([
                'nombre' => $request->nombre,
                'category_padre_id' => null,
                'es_padre' => true,
            ]);
        } else { // ? Si el tipo es hijo, actualizamos la categoria con el campo category_padre_id que nos llegue del formulario
            $category -> update([
                'nombre' => $request->nombre,
                'category_padre_id' => $request->input('category_padre_id'),
                'es_padre' => false, // ? Si es hijo (subcategoria), cambiamos el campo es_padre a false, esto lo tengo que poner para que cuando cuando edite una categoria padre y la cambie a hijo, se cambie el campo es_padre a false 0
            ]);
        }

        return redirect() -> route('Category.principal') -> with('mensaje' , 'Categoria actualizada correctamente');
    }


   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //! BORRADO HECHO CON LIVEWIRE PARA "SEGUIR" CON LA MISMA ESTRUCTURA
       /*  $category->delete();
        return redirect()->route('Category.principal')->with('mensaje', 'Categoria eliminada correctamente'); */
    }
}
