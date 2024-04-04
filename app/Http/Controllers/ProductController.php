<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        //abort(500, 'Mensaje opcional de error');
        
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
        //? Validaciones de los campos del formulario

        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:products,nombre'],
            'descripcion' => ['required', 'string', 'min:10'],
            'estado' => ['nullable'],
            'precio' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'descripcion_imagenes' => ['required', 'string', 'min:10'],
            'imagen' => ['nullable', 'array', 'min:1', 'max:4'],
        ]);
        /* dd($request -> all()); */

        //? Guardar el producto en la base de datos

        $productoCreado = Product::create([

            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => ($request->estado) ? 'DISPONIBLE' : 'NO DISPONIBLE',
            'precio' => $request->precio,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'codigo_articulo' => "#" . fake()->unique()->ean8(),
            'user_id' => auth()->user()->id,
        ]);
        // Manejar las imágenes
        $imagenes = [];

        if ($request->hasFile('imagen')) { //? Verifico si se han enviado archivos con el nombre 'imagen' en el formulario
            foreach ($request->file('imagen') as $imagen) { //? Itero sobre cada archivo enviado con el nombre imagen , en este caso solo seran imagenes
                $imagenes[] = $imagen; // Devuelve las imagines que se han enviado y recorrido en el foreach, esto solo para depurar y ver que se han enviado las imagenes
                //? Creamos un nuevo registro en la tabla images del tipo Product porque hemos llamado a la relacion images(), que es la que esta en el modelo Product (Mirar modelo Product), y le pasamos los datos de la imagen (descripcion y url_imagen).
                $productoCreado->images()->create([
                    'desc_imagen' => $request->descripcion_imagenes,
                    'url_imagen' => $imagen->store('imagen'),
                ]);
            }
        } else {
            //! Si no se han enviado imagines, asigno la imagen por defecto 'noimage.png' y la descripcion
            $productoCreado->images()->create([
                'desc_imagen' => $request->descripcion_imagenes,
                'url_imagen' => 'noimage.png',
            ]);
        }
        dd($imagenes); // Imprime todas las imágenes

        return redirect()->route('products.principal')->with('mensaje', 'Producto creado correctamente');
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
    // Obtener todas las categorías que son padres
    $categoriasPadres = Category::where('es_padre', true)->get(['id', 'nombre']);

    // Para cada categoría padre, cargar sus subcategorías
    foreach ($categoriasPadres as $categoriaPadre) {
        $categoriaPadre->subcategorias = Category::where('category_padre_id', $categoriaPadre->id)->get();
    }

    // Cargar las imágenes del producto. Asegúrate de que tu modelo Product tiene una relación images definida
    $imagenesProducto = $product->images;

    return view('products.update', compact('product', 'categoriasPadres', 'imagenesProducto'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        /* dd($request->all()); // Esto mostrará todos los datos del formulario */

        
        //
        
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:products,nombre,'. $product -> id],
            'descripcion' => ['required', 'string', 'min:10'],
            'estado' => ['nullable'],
            'precio' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'descripcion_imagenes' => ['required', 'string', 'min:10'],
            'imagen' => ['nullable', 'array', 'max:4'],
        ]);
        
        
        
        //? Actualizamos los atributos del producto 
        $product -> update([
            'nombre' => $request -> nombre,
            'descripcion' => $request -> descripcion,
            'estado' => ($request -> estado) ? 'DISPONIBLE' : 'NO DISPONIBLE',
            'precio' => $request -> precio,
            'stock' => $request -> stock,
            'category_id' => $request -> category_id,
            'user_id' => auth() -> user() -> id,
        ]);
        
        
        
        //? Manejar las imágenes para guardarlas en la carpeta imagen y añadir un registro con la imagen y la descripcion a la tabla images
        
        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $imagen) {
                $product->images()->create([
                    'desc_imagen' => $request->descripcion_imagenes,
                    'url_imagen' => $imagen->store('imagen'),
                ]);
            }
        } else {
            // Solo añadir 'noimage.png' si el producto no tiene imágenes actualmente
            if ($product->images()->count() == 0) {
                $product->images()->create([
                    'desc_imagen' => $request->descripcion_imagenes,
                    'url_imagen' => 'noimage.png',
                ]);
            }
        }

/*         // Manejo de imágenes para borrar
    if ($request->filled('imagenes_para_borrar')) {
        foreach ($request->input('imagenes_para_borrar') as $idImagen) {
            $imagen = Image::find($idImagen);
            if ($imagen) {
                Storage::delete($imagen->url_imagen); // Asegúrate de eliminar el archivo físico si es necesario
                $imagen->delete(); // Elimina el registro de la base de datos
            }
        }
    } */

    /* dd("hola"); */

        return redirect() -> route('products.principal') -> with('mensaje', 'Producto actualizado correctamente'); 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    //* Metodo que elimina las imagenes del div de imagenPreview y de la tabla iamges
    public function destroyImage($imageId)
{
    try {
        $image = Image::findOrFail($imageId);
        if(basename($image -> url_imagen) != 'noimage.png'){
            Storage::delete($image->url_imagen);
        }
        $image->delete();

        return back()->with('mensaje', 'Imagen eliminada correctamente.');
    } catch (\Exception $e) {
        return ("no se ha podido hacer nada" . $e -> getMessage());
    }
}


//todo Mostrar vista para la compra de un producto Product Overviews Previsualizacion del producto

public function productOverviews(Product $product) //? Le pasamos todo los atributos del producto
{
    $imagenes = $product->images; //? Obtenemos todas las imagenes del producto

    //dd($imagenes); //? Imprimimos las imagenes del producto 

    //todo Obtener los productos relacionados con la misma categoria, pero sin obtener el producto que se esta visualizando
    $productosRelacionadosCategoria = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->get();
        
        //dd($productosRelacionadosCategoria); //? Imprimimos los productos relacionados 

    return view('products.ProductOverviews', compact('product' , 'imagenes' , 'productosRelacionadosCategoria'));   

}

}
