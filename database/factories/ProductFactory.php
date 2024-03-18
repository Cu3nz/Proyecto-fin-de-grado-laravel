<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            //
            'nombre' => fake() -> unique() -> words(3,true),
            'descripcion' => fake() -> text(200),
            'precio' => fake() -> randomFloat(2,1,500),
            'estado' => fake() -> randomElement(['DISPONIBLE' , 'NO DISPONIBLE']),
            'imagen' => "imagen/" . fake()->picsum("public/storage/imagen", 406, 486, false),
            'category_id' => Category::all() -> random() -> id
        ];
    }
}
