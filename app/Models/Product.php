<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable= ['nombre' , 'descripcion' , 'estado' , 'precio' , 'imagen' , 'codigo_articulo' , 'category_id','stock'];



    //todo Un producto cuantas categorias puede tener? 1 por lo tnato el nombre de la funcion en singular y utilizamos belongsTo
    public function category(){
        return $this -> belongsTo(Category::class);
    }


    //todo Un producto cuantos usuarios lo puede crear? 1 por lo tnato el nombre de la funcion en singular y utilizamos belongsTo
    public function user(){
        return $this -> belongsTo(User::class);
    }

}
