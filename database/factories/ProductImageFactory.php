<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //! Para almacenar mas de una imagen para un producto

        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            // Crea una nueva instancia de Product usando el factory y asigna su id al atributo product_id.
            // Cuando se guarda el modelo que contiene este atributo, Laravel automaticamente guarda la instancia de Product en la base de datos, obtiene su id y lo asigna al atributo product_id.
            'product_id' => Product::factory(), 
             'imagen' => "imagen/" . fake()->picsum("storage/app/public/imagen", 406, 486, false), //! Lo genero en el database seeder
            /* 'descripcion' => fake()->sentence(),*/ //! La genero en el database seeder
        ];
    }
}
