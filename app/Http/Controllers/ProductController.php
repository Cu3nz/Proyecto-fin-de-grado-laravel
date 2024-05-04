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

    $primeraImagen = $imagenes->first(); //* Obtenemos la primera imagen del producto sin borrarla del array de imagenes, a comparacion de shift 

    //dd($imagenes); //? Imprimimos las imagenes del producto 

    //todo Obtener los productos relacionados con la misma categoria, pero sin obtener el producto que se esta visualizando
    $productosRelacionadosCategoria = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->get();
        
        //dd($productosRelacionadosCategoria); //? Imprimimos los productos relacionados 

         //! Para las migas de pan
        /* $categoriaPadre = $product->category->category_padre()->first(); // Usando first() para obtener el primer resultado de la relacion */
        $categoriaPadre = $product->category->category_padre; //? Obtenemos la categoria padre del producto
        $subcategoria = $product->category; //? Obtenemos la subcategoria del producto

        //* Para recuperar todas las imagenes del producto y asi visualizarlas en un apartado de la vista
        $imagenesReseña = $this->recuperarImagenesReviewsProducto($product); //? Llamamos al metodo recuperarImagenesReviewsProducto para obtener las imagenes de las reviews del producto

        //dd($imagenesReseña); //? Imprimimos las imagenes de las reviews del producto

        $reseñasUsuariosEnProuctos = $this -> obteneReviewsDelProductoConUsuarios($product); //? Llamamos al metodo obteneReviewsDelProductoConUsuarios pasandole el producto del cual quiero obtener las reviews que hace el usuario en ese producto en especificos

        return view('products.ProductOverviews', compact('product' , 'imagenes' , 'productosRelacionadosCategoria' , 'primeraImagen' , 'categoriaPadre' , 'subcategoria' , 'imagenesReseña' , 'reseñasUsuariosEnProuctos')); //? Pasamos los datos a la vista ProductOverviews

}

public function alternarLike(Request $request, $productId)
{
    $product = Product::findOrFail($productId);
    $user = auth()->user(); // Obtiene el usuario autenticado

    if ($user->likedProducts()->where('product_id', $productId)->exists()) { //* Si el usuario ya ha dado like al producto, se lo quitamos
        $user->likedProducts()->detach($productId);
        return back();
    } else { //* Si el usuario no ha dado like al producto, se lo añadimos
        $user->likedProducts()->attach($productId);
        return back();
    }
}

//todo Metodo que ayuda a recuperar todas las imagenes de las reviews de un producto y mostrarlas en la vista de ProductOverviews en el apartado Reseña con imagenes
public function recuperarImagenesReviewsProducto(Product $product)
{
    $imagenesReseña = [];

    $reseñasConImagenes = $product->reviews()->with('reviewMultiMedia')->orderBy('id','desc')-> get(); //? Obtenemos todas las reviews del producto junto con sus imagenes (gracias al with de la relacion reviewMultiMedia que esta en el modelo de Review que esta conecada con la tabla polimorfica imageable).

    foreach ($reseñasConImagenes as $reseña ) { //? Recorremos todas las reviews del producto
        foreach ($reseña -> reviewMultiMedia as $imagenesDeReseña) { //? De cada una de las reviews obtenemos todas las imagenes y la almacenamos en el array imagenesReseña 
            $imagenesReseña[] = $imagenesDeReseña;
        }
    }
    return $imagenesReseña; //? Devolvemos todas las imagenes de las reviews del producto
}

//TODO RECUPERAR TODAS LAS REVIEWS QUE HACEN USUARIOS EN UN PRODUCTO EN ESPECIFICO Y MOSTRARLAS EN LA VISTA DE PRODUCTOVERVIEWS EN LA SECCION DE RESEÑAS
public function obteneReviewsDelProductoConUsuarios(Product $product)
{
    $reviews = $product->reviews()->with('user')->orderBy('id','desc')-> get(); //* Obtenemos todas las reseñas del producto junto con el usuario que realizo cada reseña

    return $reviews; //? Devolvemos todas las reviews del producto

}




}
