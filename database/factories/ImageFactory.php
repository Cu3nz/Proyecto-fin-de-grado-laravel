<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'imageable_type' => fake() -> randomElement([Product::class , Category::class]), //? Elegimos El tipo, Product o Category
            'imageable_id' => fake() ->  randomElement([Product::all() -> random() -> id, Category::all() -> random() -> id]), //? Cogemos todos los productos y categorias y definimos un id aleatorio
        ];
    }
}
