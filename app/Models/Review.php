<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'reseña', 'user_id', 'product_id', 'puntuacion', 'pros', 'contras'];

    //todo Una reseña pertenece a un unico usuario (el que la escribe), por lo tanto el nombre de la funcion en singular y utilizamos belongsTo
    public function user(){
        return $this -> belongsTo(User::class);
    }
    //todo Una reseña pertenece a un unico producto, por lo tanto el nombre de la funcion en singular y utilizamos belongsTo
    public function product(){
        return $this -> belongsTo(Product::class);
    }

    //todo Una reseña puede tener muchas imagenes y videos, por lo tanto el nombre de la funcion en plural y utilizamos hasMany
    //! He definido media porque no queria poner de nuevo images para la tabla polimorfica
    public function reviewMultiMedia() {
        return $this->morphMany(Image::class, 'imageable');
    }
}
