<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Socialite\FacebookController;
use App\Http\Controllers\Socialite\GoogleController;
use App\Http\Middleware\ChekearRoles;
use App\Livewire\PrincipalCategory;
use App\Livewire\PrincipalLogueado;
use App\Livewire\PrincipalProducts;
use App\Livewire\TablaUsers;
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
        ->where('categories.nombre', 'Nuevo')
        // ->where('products.estado', 'NO DISPONIBLE')
        ->with('primeraImagen') //? Obtiene la primera imagen de cada producto
        ->get();
    
    $anime = Product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.nombre', 'Anime')
        ->select('products.*', 'categories.nombre as category_name')
        ->with('primeraImagen') // Obtiene la primera imagen de cada producto
        ->get();

        return view('dashboard' , compact('nuevos' , 'anime'));
    })->name('dashboard');

    /* Route::resource('category' , CategoryController::class); */
    /* Route::resource('products' , ProductController::class); */

});


//! Para los roles SuperAdmin y Admin, en estas clases solo se pueden acceder si el usuario tiene uno de estos roles, si son diferentes les saldra el abort(403)
Route::middleware([ChekearRoles::class])->group(function () {
    Route::resource('category', CategoryController::class); 
    Route::resource('products', ProductController::class);
    //todo Para el index de categorias con la tabla y el buscador: 
    Route::get('principal-category' , PrincipalCategory::class) -> name('Category.principal');
    //todo Para el index de productos con la tabla y el buscador
    Route::get('principal-products' , PrincipalProducts::class) -> name('products.principal');
    Route::get('tableUser' , TablaUsers::class) -> name('tableUser');
});

//! Para mostrar las categorias padres cuando hagas click en el boton de categorias en el navbar, la he tenido que sacar por el rol ya que a esta ruta tiene que acceder usuarios normales
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');




//todo Para borrar las imagenes del update de products
/* Route::delete('/products/images/{image}', 'ProductController@destroyImage')->name('products.images.destroy'); */
Route::post('/products/images/{image}', [ProductController::class, 'destroyImage'])->name('products.images.destroy');
/* Route::post('/products/images/{image}', [ImageController::class, 'destroy'])->name('products.images.destroy'); */

//! Borrar
//todo Para el buscador de index de categorias: 
/* Route::get('/category/buscar' , 'CategoryController@buscar') -> name('category.buscar'); */



//? PARA LOS PRODUCTOS

//todo Para mostrar las subcategorias de una categoria padre: 
Route::get('/category/{categoryId}/subcategorias' , [CategoryController::class , 'mostrarSubcategorias']) -> name('category.subcategorias');

//todo Para mostrar en un card los productos de una subcategoria:
Route::get('/category/{idSubcategoria}/productos' , [CategoryController::class , 'mostrarProductosSubcategorias']) -> name('productosConSubcategoria');

//todo Product Overview de un producto 
Route::get('/products/{product}/overview' , [ProductController::class , 'productOverviews']) -> name('overviewProduct');








//todo login con google
Route::get('/google-auth/redirect' , [GoogleController::class , 'redirect']) -> name('google.redirect');
Route::get('/google-auth/callback' , [GoogleController::class , 'callback']) -> name('google.callback');

//todo login con facebook
Route::get('/facebook-auth/redirect' , [FacebookController::class , 'redirect']) -> name('facebook.redirect');
Route::get('/facebook-auth/callback' , [FacebookController::class , 'callback']) -> name('facebook.callback');
