<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

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

        return view('products.reseñas' , compact('product')); //? Le paso el producto al cual quiero hacer la reseña a la vista para asi poder poner la imagen y el nombre del producto.
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
            'imagen' => ['nullable', 'array', 'min:1', 'max:4'],
        ]);


        $product = Product::findOrFail($request->product_id); // Buscamos el producto en la tabla products mediante el id que se ha pasado por el input de tipo hidden en la vista reseñas.blade.php, si lo encuentra almacena todos los datos del producto en la variable $product, si no lo encuentra devuelve un error 404


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
                $reseñaCreada->reviewMultiMedia()->create([ //todo guardo la imagen y la descripcion para la imagen en la tabla images de la base de datos de la siguiente manera , con la relacion "reviewMultiMedia" que viene de la funcion que esta en el modelo Review.php y que esta relacionada con la tabla polimorfica imageable "return $this->morphMany(Image::class, 'imageable');"
                    'url_imagen' => $imagen->store('imgReseñas'), //? Guardo la imagen en la carpeta imgReseñas
                    'desc_imagen' => 'Imagen de reseña del producto' . " " . $product->nombre, //? Descripcion de la imagen con el nombre del producto
                ]);
            }
        }

        //dd($imagenesReseña);

        return redirect()->route('overviewProduct', $request->product_id)->with('mensaje', 'Gracias por tu reseña, se ha guardado correctamente 🥰'); //? Volvemos al producto al cual le hemos hecho la reseña
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
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
