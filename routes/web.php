<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Livewire\PrincipalCategory;
use App\Livewire\PrincipalProducts;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $nuevos = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.nombre as category_name')
        ->where(function ($query) {
            $query->where('categories.nombre', 'Nuevo');
                  /* ->where('products.estado', 'NO DISPONIBLE'); */
        })
        ->get();

            $anime = Product::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('category_name', 'Anime')
            ->select('products.*', 'categories.nombre as category_name')
            ->get();
        return view('dashboard' , compact('nuevos' , 'anime'));
    })->name('dashboard');

    Route::resource('category' , CategoryController::class);
    Route::resource('products' , ProductController::class);

});


//todo Para el index de categorias con la tabla y el buscador: 
Route::get('category' , PrincipalCategory::class) -> name('Category.principal');

//todo Para el index de productos con la tabla y el buscador

Route::get('products' , PrincipalProducts::class) -> name('products.principal');

//! Borrar
//todo Para el buscador de index de categorias: 
/* Route::get('/category/buscar' , 'CategoryController@buscar') -> name('category.buscar'); */



//todo login con google
Route::get('/google-auth/redirect' , [GoogleController::class , 'redirect']) -> name('google.redirect');
Route::get('/google-auth/callback' , [GoogleController::class , 'callback']) -> name('google.callback');
