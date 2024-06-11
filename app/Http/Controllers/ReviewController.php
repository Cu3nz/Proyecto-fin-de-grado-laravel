<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use Intervention\Image\Facades\Image as OptimizarImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
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
    public function create(Product $product)
    {
        //* Le pasamos el producto el cual quiero realizar la reseña
        //dd($product);

        return view('reseñas.reseñas' , compact('product')); //? Le paso el producto al cual quiero hacer la reseña a la vista para asi poder poner la imagen y el nombre del producto.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => ['required', 'string', 'min:5'],
            'reseña' => ['required', 'string', 'min:10'],
            'puntuacion' => ['required', 'numeric', 'min:1', 'max:5'],
            'pros' => ['nullable', 'string', 'min:1'],
            'contras' => ['nullable', 'string', 'min:1'],
            'product_id' => ['nullable', 'exists:products,id'],
            'imagen' => ['nullable', 'array', 'min:1', 'max:4'], //? Aeguro que el array tenga minimo 1 imagen y maximo 4
            'imagen.*' => ['file', 'mimes:jpeg,png,jpg,gif,svg,webp'], //? Aseguro que cada imagen sea un archivo de tipo imagen con los mimes definidos
        ]);



        $product = Product::findOrFail($request->product_id); // Buscamos el producto en la tabla products mediante el id que se ha pasado por el input de tipo hidden en la vista reseñas.blade.php, si lo encuentra almacena todos los datos del producto en la variable $product, si no lo encuentra devuelve un error 404

        //dd($product);

        $reseñaCreada = Review::create([

            'titulo' => $request->titulo,
            'reseña' => $request->reseña,
            'puntuacion' => $request->puntuacion,
            'pros' => $request->pros,
            'contras' => $request->contras,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
        ]);

        //? Guardar imagenes

        $imagenesReseña = []; //* Esto es un array que la utilizo simplemente para controlar que las imagenes se estan pasando

        if ($request->hasFile('imagen')) { //? Si se han subido un tipo de archivo imagen (concuerda con el name del input file del formulario de reseñas.blade.php (name="imagen[]"))
            foreach ($request->file('imagen') as $imagen) { //? Recorro cada imagen que se ha subido
                $imagenesReseña[] = $imagen; //* La almaceno en el array para controlar que se estan pasando las imagenes
                
                //todo OPTIMIZAR IMAGENES   

                // Guardar la imagen original
            $path = $imagen->store('imgReseñas');
            
            // Optimizar la imagen
            $imagenTemporal = Storage::get($path);
            $filename = pathinfo($path, PATHINFO_FILENAME) . '.webp';
            $optimizedPath = 'imgReseñas/' . $filename;

            $imagenOptimizada = OptimizarImagen::make($imagenTemporal)
                ->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('jpg', 75);

            // Guardar la imagen optimizada en el almacenamiento
            Storage::put($optimizedPath, (string) $imagenOptimizada);

            // Eliminar la imagen original
            Storage::delete($path);


                $reseñaCreada->reviewMultiMedia()->create([ //? creo la imagen y la descripcion para la imagen en la tabla images de la siguiente manera , "reviewMultiMedia" viene de la funcion que esta en el modelo Review.php
                    'url_imagen' => $optimizedPath, //? Guardo la imagen en la carpeta imgReseñas
                    'desc_imagen' => 'Imagen de reseña del producto' . " " . $product->nombre, //? Descripcion de la imagen con el nombre del producto
                ]);
            }
        }
        //dd($imagenesReseña);

        return redirect()->route('overviewProduct', $request->product_id)->with('reviewCreate', 'Gracias por tu reseña, se ha guardado correctamente 🥰');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review){

        //dd($review); //? Devuelve todos los atributos de la reseña que se va a editar, esto es gracias a que en el enlace he pasado el id de la reseña.

        $product = Product::findOrFail($review -> product_id); //* Lo que estamos haciendo aqui internamente es primero meternos en la tabla reviews y buscar el id que contiene $review , por ejemplo id 17 y recoge el product_id que contiene ese registro con id 17. Y una vez que tengas el producto, se busca en la tabla products y se captura todos sus datos y se almacena en la variable $product

        //dd($product); //? Devuelve todos los atributos del producto

        $nombreProducto = $product -> nombre; //? Nos metemos dentro del objeto producto y cogemos el nombre del producto
        //dd($nombreProducto); //? Devuelve el nombre del producto

        $primeraImagen = $product -> primeraImagen; //? Recuperamos la primera imagen
        //todo otra forma si no tengo el metodo primeraImagen
        //$primeraImagen = $product -> images -> first();

        //dd($primeraImagen); //? Devuelve la primera imagen del producto

        $imagenesReseña = $review -> reviewMultiMedia()->get(); //? Recuperamos todas las imagenes de la reseña

        //dd($imagenesReseña); //? Devuelve todas las imagenes de la reseña

        return view('reseñas.edit' , compact('review' , 'product' , 'imagenesReseña')); //! Solo necesitamos pasar el producto, porque en la vista edit.blade.php ya me encargo de recoger los datos que necesito del producto y de la reseña claramente

     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:5'],
            'reseña' => ['required', 'string', 'min:10'],
            'puntuacion' => ['required', 'numeric', 'min:1', 'max:5'],
            'pros' => ['nullable', 'string', 'min:1'],
            'contras' => ['nullable', 'string', 'min:1'],
            'product_id' => ['nullable', 'exists:products,id'],
            'imagen' => ['nullable', 'array', 'min:1', 'max:4'], // Asegura que el array tenga entre 1 y 4 elementos
            'imagen.*' => ['file', 'mimes:jpeg,png,jpg,gif,svg,webp'], // Se aplica a cada archivo en el array
        ]);

         $review -> update([

            'titulo' => $request -> titulo,
            'reseña' => $request -> reseña ,
            'puntuacion' => $request -> puntuacion ,
            'pros' => $request -> pros ,
            'contras' => $request -> contras,
            'product_id' => $request -> product_id ,
            'user_id' => auth()->user()->id
        ]);

        //? Guardar imagenes
        $product = Product::findOrFail($request->product_id);
        //dd($product);
        $imagenesReseña = []; //* Esto es un array que la utilizo simplemente para controlar que las imagenes se estan pasando
        
        if ($request->hasFile('imagen')) { //? Si se han subido un tipo de archivo imagen (concuerda con el name del input file del formulario de edit.blade.php (carpeta reseñas) (name="imagen[]"))
            foreach ($request->file('imagen') as $imagen) { //? Recorro cada imagen que se ha subido
                $imagenesReseña[] = $imagen; //* La almaceno en el array para controlar que se están pasando las imágenes
                
                // Guardar la imagen original
                $path = $imagen->store('imgReseñas');
                
                // Optimizar la imagen
                $imagenTemporal = Storage::get($path);
                $filename = pathinfo($path, PATHINFO_FILENAME) . '.webp';
                $optimizedPath = 'imgReseñas/' . $filename;
    
                $imagenOptimizada = OptimizarImagen::make($imagenTemporal)
                    ->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('jpg', 85);
    
                // Guardar la imagen optimizada en el almacenamiento
                Storage::put($optimizedPath, (string) $imagenOptimizada);
    
                // Eliminar la imagen original
                Storage::delete($path);
    
                // Crear registro de la imagen optimizada en la base de datos
                $review->reviewMultiMedia()->create([
                    'url_imagen' => $optimizedPath,
                    'desc_imagen' => 'Imagen de reseña del producto ' . $product->nombre,
                ]);
            }
        }

        //dd($imagenesReseña);

        return redirect() -> route('overviewProduct' , $request -> product_id) -> with('reviewUpdate' , 'Reseña actualizada correctamente');
        
    }
    /**
     * Remove the specified resource from storage.
     */
    //? Elimina la reseña junto con las imagenes asociadas a ella
    public function destroy(Review $review)
    {
        //
        //dd($review);

        $imagenesReview = $review -> reviewMultiMedia; //? Coseguimos las imagenes de la reseña que queremos borrar
        //dd($imagenesReview);

        foreach ($imagenesReview as $imagen) {
            Storage::delete($imagen -> url_imagen); //? Borramos las imagenes de la carpeta storage
            $imagen -> delete(); //? Borramos las imagenes de la tabla images
        }

        $review -> delete(); //? Borramos la reseña de la tabla reviews


        return redirect() -> back() -> with('reviewDelete', 'Reseña eliminada correctamente');

    }


    public function eliminarImgsUpdate($imgID){

        //dd($imgID); //* Recogo el id de la imagen que se va a borrar

        $DatosImage = Image::findOrFail($imgID); //? buscamos todo los datos del registro con el id pasado en la tabla image mediante el id que se ha pasado por la url en edit
        //dd($DatosImage);
        $reseñaEditandoActualmente = Review::findOrFail($DatosImage -> imageable_id ); //? imageable_id es la id de la reseña que se esta editanto en la tabla Reviews
        //dd($reseñaEditandoActualmente);

        if ($imgID){
            Storage::delete($DatosImage -> url_imagen); //? Borramos la imagen de la carpeta
            $DatosImage -> delete(); //? Borramos la imagen de la tabla images
            return redirect() -> back() -> with('success' , 'Imagen eliminada correctamente');
        } else{
            return redirect() -> route('reviews.edit' , $reseñaEditandoActualmente -> id) -> with('error' , 'Error al eliminar la imagen');
        }



    }
}
