<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

protected $fillable = ['user_id', 'product_id', 'nombre_producto', 'imagen_producto', 'precio_unitario', 'email_usuario', 'cantidad' , 'codigo_articulo', 'total'];

    // todo Un carrito pertenece a un solo usuario por lo tanto nombre de la funcion en singular y utilizando el metodo belongsTo
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //todo Un carrito (o línea de carrito) pertenece a un solo producto, por lo tanto el nombre de la función es singular
    //todo y utilizamos el método belongsTo para definir la relación
    //! Cada entrada en la tabla carts representa un producto específico que un usuario ha añadido a su carrito.
    //!Aunque un carrito de un usuario puede contener múltiples productos, cada fila en la tabla carts está relacionada con un único producto.
    //* Por lo tanto cada registro de la tabla carts está vinculado a un único registro de la tabla products o producto en si
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
