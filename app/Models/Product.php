<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= ['nombre' , 'descripcion' , 'estado' , 'precio' , 'imagen' , 'category_id'];



    //todo Un producto cuantas categorias puede tener? 1 por lo tnato el nombre de la funcion en singular y utilizamos belongsTo
    public function category(){
        return $this -> belongsTo(Category::class);
    }
}
