<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
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

     protected static ?string $password; //? IMPORTANTE PONER ESTO PARA la contraseña

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

        Storage::deleteDirectory('categorias_imagenes');
        Storage::makeDirectory('categorias_imagenes');

        $this->call(CategorySeeder::class);

        Storage::deleteDirectory('imagen');
        Storage::makeDirectory('imagen');

        // Crea algunos productos
        $products = Product::factory(20)->create();

        // Para cada producto, genera una descripción única que se aplicará a todas sus imágenes
        $products->each(function ($product) {
            $description = fake()->sentence(); // Genera una descripción única para cada producto aquí

            for ($i = 0; $i < 4; $i++) {
                $product->images()->save(Image::factory()->make([
                    'desc_imagen' => $description, // Aplica la misma descripción a todas las imágenes de este producto
                    'url_imagen' => "imagen/" . fake()->picsum("storage/app/public/imagen", 406, 486, false),
                ]));
            }
        });

        // Asignar una imagen a cada categoría creada por CategorySeeder
        $categories = Category::all(); // Obtén todas las categorías existentes

        foreach ($categories as $category) {
            $category->image()->save(Image::factory()->make([
                'desc_imagen' => fake()->sentence(),
                'url_imagen' => "categorias_imagenes/" . fake()->picsum("storage/app/public/categorias_imagenes", 406, 486, false),
            ]));
        }
    }
    //todo SERGIO
    
    // Para cada producto, genera una descripcion y crea 5 imágenes con la misma descripcion
    /*  $products->each(function ($product) {
        $description = fake()->sentence(); // Genera una descripción unica para cada producto
        ProductImage::factory()->count(5)->create([ //? Crea 5 imagenes para cada producto
            'product_id' => $product->id, // Asocia las imagenes al producto actual
            'descripcion' => $description, // Usa la misma descripción para todas las imágenes de este producto
        ]);
    }); */
    
    
    
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
