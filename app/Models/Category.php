<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'category_padre_id','es_padre' , 'descripcion'];


    public function products(){
        return $this -> hasMany(Product::class);
    }


    //todo Categoria padre

    public function category_padre(){
        return $this -> belongsTo(Category::class, 'category_padre_id');
    }

    //todo Categoria hija
    public function children(){
        return $this -> hasMany(Category::class, 'category_padre_id');
    }

    //! Para el polimorfismo de las imagenes (Category y Product)

    //todo Una categoria tiene una imagen por lo tanto nombre de la funcion en singular y utilizamos morphOne
    public function image():MorphOne{ 
        return $this -> morphOne(Image::class, 'imageable');
    }
}
