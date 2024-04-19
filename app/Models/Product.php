<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
