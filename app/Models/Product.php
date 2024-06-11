<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable= ['nombre' , 'descripcion' , 'estado' , 'precio' , 'imagen' , 'codigo_articulo' , 'category_id','stock' ,'user_id'];



    //todo Un producto cuantas categorias puede tener? 1 por lo tnato el nombre de la funcion en singular y utilizamos belongsTo
    public function category(){
        return $this -> belongsTo(Category::class);
    }


    //todo Un producto cuantos usuarios lo puede crear? 1 por lo tnato el nombre de la funcion en singular y utilizamos belongsTo
    public function user(){
        return $this -> belongsTo(User::class);
    }


     //todo Un producto puede tener muchas imagenes, por lo tanto el nombre de la funcion en plural y utilizamos hasMany
    /*  public function images(){
        return $this -> hasMany(ProductImage::class);
    } */

    //! Para el polimorfismo de las imagenes (Category y Product)

    //todo Un producto tiene mas de una imagen, por lo tanto el nombre de la funcion en plural y utilizamos  morphMany
    public function images(){
        return $this -> morphMany(Image::class, 'imageable');
    }

    public function primeraImagen()
    {
        return $this->morphOne(Image::class, 'imageable')->orderBy('id', 'asc');
    }

    //todo Un producto puede tener likes de muchos usuarios , por lo tanto el nombre de la funcion en plural y utilizamos belongsToMany
    public function likeDeUsers() {
        return $this->belongsToMany(User::class, 'product_user_likes');
    }

    //todo Un producto puede tener asociadas muchas reviews, por lo tanto el nombre de la funcion en plural y utilizamos hasMany
    public function reviews(){
        return $this -> hasMany(Review::class);
    }


    protected static function booted()
    {
        //* Escucha el evento de eliminacions del producto
        static::deleting(function ($product) {
            //? Elimina las imagenes de las reseñas asociadas al producto
            $product->borrarImagenesReseñas();
        });
    }

  

    public function borrarImagenesReseñas()
    {
        // Obtiene todas las reseñas asociadas al producto
        $reviews = $this->reviews()->with('reviewMultiMedia')->get();

        // Elimina las imagenes de cada reseña
        foreach ($reviews as $review) {
            foreach ($review->reviewMultiMedia as $image) {
                // Borra el archivo de la imagen del almacenamiento
                Storage::delete($image->url_imagen);
                // Borra el registro de la imagen de la base de datos
                $image->delete();
            }
        }
    }


    //todo Para la puntuacion de los productos, basicamente para hacer las estrellas y el recuadro de las reseñas con el %

    public function puntuacionPromedio()
    {
        //? Si no hay reseñas, la puntuación promedio es 0
        $totalResenas = $this->reviews->count(); //* Cuenta el numero de reseñas asociadas al producto utilizando la relacion reviews() y count() para contar
         //dd($totalResenas);
        if ($totalResenas == 0) {
            return 0;
        }

        //? Suma de todas las puntuaciones de las reseñas de un producto osea busca un producto y suma todos los valores de la columna puntuacion de la tabla reviews
        $puntuacionTotal = $this->reviews->sum('puntuacion'); 
        //? Dividimos la suma total del atributo puntuacion y lo dividimos por el total de reseña que tiene el producto y redondeadmos a 1 decimal. 
        return round($puntuacionTotal / $totalResenas, 1); //? Redondeo a 1 decimal
    }
}


