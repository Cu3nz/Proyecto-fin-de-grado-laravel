<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductUserLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $producto = Product::all(); //? Obtenemos todos los productos de la tabla products (que se han creado en el databaseeder) y los almacenamos en la variable $producto

        foreach ($producto as $product) {
            
            $product -> likeDeUsers() -> attach(self::devolverIdsUser()); //* A cada producto le asignamos los likes de los usuarios que han dado like al producto, que es el numero que haya devuelto la variable $arrayIndicesRandom.
        }
    }

    private static function devolverIdsUser(){

        $likes = []; //? Definimos un array vacia

        $idsTablaUsers = User::pluck('id') -> toArray(); //? Obtenemos todos los ids de la tabla users y lo convertimos en un array y la almacenamos en la variable $idsTablaUsers

        $arrayIndicesRandom = array_rand($idsTablaUsers , random_int(2,count($idsTablaUsers))); //? Devuelve un unico valor, ese valor es el numero de likes que va a tener un producto, por lo tanto si sale el numero 2 el producto va a tener 2 likes de 2 usuarios.

        foreach ($arrayIndicesRandom as $indice) {
            
            $likes[] = $idsTablaUsers[$indice]; //? Guardamos en el array $likes los ids de los usuarios que han dado like al producto, que es el numero que haya devuelto la variable $arrayIndicesRandom.
        }

        return $likes; //? Devolvemos el array con los ids de los usuarios que han dado like al producto.


    }
}
