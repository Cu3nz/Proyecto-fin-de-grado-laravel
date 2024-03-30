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
        //todo Esta vista mostrarar todas las categorias padres 

        $categoriasPadres = Category::where('es_padre', true)->get();

        return view('categorias.mostrarCategoriasPadres', compact('categoriasPadres'));
    }



    //todo Metodo para mostrar las subcategorias de una categoria padre
    public function mostrarSubcategorias($idCategoriapadre)
    {
        //? Buscamos por la categoria padre y a la vez por las hijas (subcategorias) de esa categoria padre, por lo tanto lo que hacemos es cargar todas las subcategorias que coincida con el atributo category_padre_id de la categoria padre 

        //* Ejemplo de lo que hace with('children') en la query: 
        //? Promociones -> id = 1 ($idCategoriapadre) category_padre_id = null
        //* Nuevo -> id = 2 category_padre_id = 1
        //* Oferta -> id = 3 category_padre_id = 1
        //? por lo tanto con la relacion children lo que estamos haciendo es sacar las subcategorias que tienen el mismo id de la categoria padre en el atributo category_padre_id. Nuevo y Oferta son subcategorias de la categoria padre Promociones, porque en su category_padre_id tiene el id de la categoria padre Promociones = 1
        // El metodo findorFail lo que hace es buscar la id que le pasamos por parametro, si la encuentra almacena en la variable lo que devuevle la query, si no la encuentra, devuelve un error 404 que es mostrado por pantalla
        $subcategoriasDePadre = Category::with('children')->findOrFail($idCategoriapadre);
        $array = [];
        foreach ($subcategoriasDePadre->children as $item) {
            $array[] = [
                'categoria_padre' => $subcategoriasDePadre->nombre,
                'id' => $item->id,
                'nombre' => $item->nombre,
                'category_padre_id' => $item->category_padre_id
            ];
        }
        /* dd($array); */
        return view('categorias.mostrarSubcategorias', compact('subcategoriasDePadre'));
    }

    //todo Metodo para mostrar todos los productos de una categoria

    public function mostrarProductosSubcategorias($idSubcategoria)
    {
        //? Basicamente lo que hacemos es que en la tabla categories el id que esta en el atributo id de la categoria hija (subcategoria), tenga el mismo id en la tabla products en el atributo category_id

        //* Ejemplo de lo que hace with('products') en la query si pasamos el id de subcategoria Death Note (id = 13):
        //? tabla categories subcategoria Death Note = id = 13 category_padre_id = 5 (Anime)

        //* por lo tanto busco en la tabla products (gracias a la relacion de with products) en el atributo category_id productos que tengan la id 13, y esos son los productos que tiene esa subcategoria llamada death note


        $idDeSubcategoria = Category::with('products')->findOrFail($idSubcategoria);

        //dd($idDeSubcategoria); //? Mostramos todos los atributos de la categoria pulsada, en este caso, si pulsamos en la categoria oferta nos da todos sus atributos, donde la id = 2

        $productos = $idDeSubcategoria->products; //? Obtenemos todos los productos de la subcategoria pulsada gracias a su ID

        return view('products.mostrarProductosSubcategoria', compact('productos'));
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
            'descripcion' => ['required', 'string', ' min:10'], //? Descripcion de categoria
            'desc_imagen' => ['required', 'string', ' min:10'] //? Descripcion de la imagen
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

        $ruta = ($request->imagen) ? $request->imagen->store('categorias_imagenes') : 'noimage.png';


        $category->image()->create([
            'desc_imagen' => $request-> desc_imagen,
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
        return view('categorias.update', compact('category', 'categoriasPadres'));
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
            'descripcion' => ['required', 'string', ' min:10'],
            'desc_imagen' => ['required', 'string', ' min:10']
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
                'desc_imagen' => $request->desc_imagen,
                'url_imagen' => $imagenActualCategoria
            ]);
        } else {
            $category->image()->create([
                'desc_imagen' => $request->desc_imagen,
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
