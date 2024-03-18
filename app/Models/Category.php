<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'category_padre_id','es_padre'];


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
}
