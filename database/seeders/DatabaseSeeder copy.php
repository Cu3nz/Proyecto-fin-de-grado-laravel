<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(1)->create([
            'name' => 'Usuario Tienda',
            'email' => 'nombretienda@gmail.com', //! IMPORTANTE PONER EL EMAIL DE LA TIENDA
            'password' => static::$password ??= Hash::make('password'),
            'rol' =>  'superAdmin',
        ]);

        User::factory(1)->create([
            'name' => 'Sergio Gallegos',
            'email' => 'superadmin@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'rol' =>  'superAdmin',
        ]);
        User::factory(1)->create([
            'name' => 'Fermin Trujillo',
            'email' => 'superadmin2@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'rol' =>  'superAdmin',
        ]);
        
        User::factory(1) -> create([
            'name' => 'Bichito',
            'email' => 'bichitoadmin@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'rol' => 'admin',
        ]);
        User::factory(1) -> create([
            'name' => 'Bichito2',
            'email' => 'bichito2admin@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'rol' => 'admin',
        ]);

        User::factory(2)->create();

        $this->call(CategorySeeder::class);
    
        Storage::deleteDirectory('imagen');
        Storage::makeDirectory('imagen');
    
        // Crea 50 productos
        $products = Product::factory(10)->create();

        //todo SERGIO

        // Para cada producto, genera una descripcion y crea 5 imágenes con la misma descripcion
        $products->each(function ($product) {
            $description = fake()->sentence(); // Genera una descripción unica para cada producto
            ProductImage::factory()->count(5)->create([ //? Crea 5 imagenes para cada producto
                'product_id' => $product->id, // Asocia las imagenes al producto actual
                'descripcion' => $description, // Usa la misma descripción para todas las imágenes de este producto
            ]);
        });



        /* // Para cada producto, crea 5 imágenes
        $products->each(function ($product) {
            ProductImage::factory()->count(5)->create([
                'product_id' => $product->id, // Asocia las imágenes al producto actual
                // La descripción y la ruta de la imagen se generan en el factory
            ]);
        });   */  

        /* User::factory()->create([
            'name' => 'sergio',
            'email' => 'sergio@gmail.com',
            'rol' => 'superadmin',
        ]); */
    }
}
