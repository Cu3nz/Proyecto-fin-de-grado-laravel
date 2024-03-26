<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'imagen' => ['nullable', 'image', ' max:2048'],
            'descripcion' => ['required', 'string', ' min:10']
        ];

        //todo Si el tipo es hijo se añadira el select para seleccionar las categorias que son padres por lo tanto, añadimos la validacion para el campo category_padre_id
        if ($request->input('tipo') === 'hijo') {
            $reglas['category_padre_id'] = ['required', 'exists:categories,id'];
        }

        //* Validamos con las reglas seleccionadas
        $request->validate($reglas);



        //todo Si el tipo es hijo , creamos la categoria con el campo category_padre_id de la categoria padre y el atributo es_padre en false, si no es hijo y es padre, el campo category_padre_id sera null y es padre a true
        $categoryPadreId = $request->input('tipo') === 'hijo' ? $request->input('category_padre_id') : null;

        // Crear la categoría
        $category = Category::create([
            'nombre' => $request->nombre,
            'category_padre_id' => $categoryPadreId,
            'es_padre' => $request->input('tipo') === 'padre',
            'descripcion' => $request->descripcion,
        ]);

        $ruta = ($request -> imagen) ? $request -> imagen -> store('categorias_imagenes') : 'noimage.png';

        
        $category->image()->create([
            'desc_imagen' => $request->descripcion,
            'url_imagen' => $ruta,
        ]);

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
            'nombre' => ['required', 'string', 'min:3', 'unique:categories,nombre,' . $category->id],
            'tipo' => ['required', 'in:padre,hijo'], //? Solo se puede seleccionar estos dos tipos, si se cambia el nombre dara un error
            'imagen' => ['nullable', 'image', ' max:2048'],
            'descripcion' => ['required', 'string', ' min:10']
        ];

        //todo Comprobacion de la imagen, si se sube una nueva imagen, se eliminara la actual de esa categoria (solo si es distinta de la noimage.png) y se subira la nueva

        $imagenActualCategoria = $category->image->url_imagen;

        /* dd($imagenActualCategoria); */

        if ($request->imagen) { //* Si se ha subido una imagen

            if (basename($imagenActualCategoria) != 'noimage.png') { //? Si el nombre de la imagen en la base de datos es distinta a "noimage.png", borramos la foto
                Storage::delete($imagenActualCategoria);
            }

            //! Sobreescribimos la imagen actual con la nueva 
            //* Si se ha subido una imagen, la guardamos con el metodo store en la carpeta con las imagenes de categorias
            $imagenActualCategoria = $request->imagen->store('categorias_imagenes');
            /*             dd($imagenActualCategoria); */
        }

        //todo Si el tipo es hijo se añadira el select para seleccionar las categorias que son padres por lo tanto, añadimos la validacion para el campo category_padre_id
        if ($request->input('tipo') === 'hijo') {
            $reglas['category_padre_id'] = ['required', 'exists:categories,id'];
        }

        //* Validamos con las reglas seleccionadas Validar la solicitud con las reglas definidas
        $request->validate($reglas);



        // ? Si el tipo es padre, actualizamos la categoria con el campo category_padre_id a null y es_padre a true
        if ($request->input('tipo') === 'padre') {
            $category->update([
                'nombre' => $request->nombre,
                'category_padre_id' => null,
                'es_padre' => true,
                'descripcion' => $request->descripcion,
            ]);
        } else {
            $category->update([
                'nombre' => $request->nombre,
                'category_padre_id' => $request->input('category_padre_id'),
                'es_padre' => false,
                'descripcion' => $request->descripcion,
            ]);
        }

        if ($category->image) {
            $category->image()->update([
                'desc_imagen' => $request->descripcion,
                'url_imagen' => $imagenActualCategoria
            ]);
        } else {
            $category->image()->create([
                'desc_imagen' => $request->descripcion,
                'url_imagen' => $imagenActualCategoria
            ]);
        }

        return redirect()->route('Category.principal')->with('mensaje', 'Categoria actualizada correctamente');
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
