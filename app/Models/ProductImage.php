<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'imagen', 'descripcion'];


    //todo Una imagen o varias imagenes pertenecen a un producto, por lo tanto el nombre de la funcion en singular y utilizamos belongsTo

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
