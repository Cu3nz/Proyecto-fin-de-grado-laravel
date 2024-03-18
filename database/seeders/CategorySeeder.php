<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoriasSinSubcategorias = [
            'Nuevo',
            'En Oferta'
        ];

        foreach ($categoriasSinSubcategorias as $nombreCategoria) {
            Category::firstOrCreate(['nombre' => $nombreCategoria] , ['category_padre_id' => null , 'es_padre' => false]);
        }

        $categoriasPadres = [
            'Dibujos Animados',
            'Anime',
        ];

        foreach ($categoriasPadres as $nombreCategoriaPadre) {
            Category::firstOrCreate(['nombre' => $nombreCategoriaPadre] , ['category_padre_id' => null , 'es_padre' => true]);
             //todo Esto devuelve: 
        //? Dibujos Animados , id => 1 , category_padre_id => null , es_padre => true
        //? Anime , id => 2 , category_padre_id => null , es_padre => true
        }

        // Ahora crearemos las subcategorías asociadas a cada categoría padre

        //todo PARA DIBUJOS ANIMADOS

        $categoriaPadreDibujosAnimados = Category::where('nombre' , 'Dibujos Animados') -> first(); //? Busca una categoria con el nombre de Dibujos animados y guarda en la variable $categoriaDibujosAnimados todos los atributos de la base de datos asociada a esa categoria (id, nombre , es_padre, category_padre_id)

        $subcategoriaDibujosAnimados = ['Mickey Mouse', 'Los Simpsons', 'Agallas el perro cobarde', 'SpongeBob SquarePants'];

        foreach ($subcategoriaDibujosAnimados as $nombreSubcategoriaDibujosAnimados) {
            Category::firstOrCreate(['nombre' => $nombreSubcategoriaDibujosAnimados] , ['category_padre_id' => $categoriaPadreDibujosAnimados -> id , 'es_padre' => false]);
            //todo Esto lo que hace es lo siguiente:
            //? Mickey Mouse , id => 3 , category_padre_id => 1 , es_padre => false
            //? Los Simpsons , id => 4 , category_padre_id => 1 , es_padre => false
            //? Agallas el perro cobarde , id => 5 , category_padre_id => 1 , es_padre => false
            //? SpongeBob SquarePants , id => 6 , category_padre_id => 1 , es_padre => false
        }


        //todo Para anime

        $categoriaPadreAnime = Category::where('nombre' , 'Anime') -> first(); //? Busca una categoria con el nombre de Anime y guarda en la variable $categoriaAnime todos los atributos de la base de datos asociada a esa categoria (id, nombre , es_padre, category_padre_id)

        $subcategoriaAnime = ['Shingeki no Kyojin', 'Kimetsu No Yaiba', 'Prety cure', 'Death Note'];

        foreach ($subcategoriaAnime as $nombreSubcategoriaAnime) {
            
            Category::firstOrCreate(['nombre' => $nombreSubcategoriaAnime] , ['category_padre_id' => $categoriaPadreAnime -> id , 'es_padre' => false]);
            //todo Esto lo que hace es lo siguiente:
            //? Shingeki no Kyojin , id => 7 , category_padre_id => 2 , es_padre => false
            //? Kimetsu No Yaiba , id => 8 , category_padre_id => 2 , es_padre => false
            //? Prety cure , id => 9 , category_padre_id => 2 , es_padre => false
            //? Death Note , id => 10 , category_padre_id => 2 , es_padre => false
        }
    }
}
