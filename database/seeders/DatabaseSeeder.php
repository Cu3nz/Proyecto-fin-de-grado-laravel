<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(2)->create();

         $this->call(CategorySeeder::class);

         Storage::deleteDirectory('imagen');
 
         Storage::makeDirectory('imagen');
 
         Product::factory(50) -> create();

        /* User::factory()->create([
            'name' => 'sergio',
            'email' => 'sergio@gmail.com',
            'rol' => 'superadmin',
        ]); */
    }
}
