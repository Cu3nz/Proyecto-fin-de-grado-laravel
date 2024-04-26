<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Category;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ?  Home Miga de pan 1
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

//todo Link de Gestionar categorias (Solo para admins)

//? Home / Gestion de categorias ( para admin admin) Miga de pan 2 Livewire categorias
Breadcrumbs::for('gestion_categorias', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Gestionar Categorias', route('Category.principal'));
});

//? Home / Gestion de categorias / Actualizando la Categoria Nombre categoria actualizando Miga de pan 3
Breadcrumbs::for('category.update', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('gestion_categorias');
    $categoryName = $category->nombre ?? 'Nombre de Categoría Desconocido';
    $trail->push('Actualizando la Categoria ' . $category -> nombre, route('category.update', $category->id)); //! Defino el nombre de la categoria con $category -> nombre
});

//? Home / Gestion de productos / Crear Categoria Miga de pan 4
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('gestion_categorias');
    $trail->push('Crear Categoria', route('category.create'));
});

//todo Fin Link de Gestionar categorias (Solo para admins)


//todo Link categorias del nav

//? Home / Categorias (Vista donde se ve todas las categorias padre) Miga de pan 5 
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categorias Padre', route('category.index')); //todo Metodo que visualiza todas las categorias padre
});


//? Home / Categorias / Tienda (La categoria padre seleccionada)  Miga de pan 6
Breadcrumbs::for('category.subcategorias', function (BreadcrumbTrail $trail, $categoriaPadre) {
    $trail->parent('category.index');
    $trail->push($categoriaPadre->nombre, route('category.subcategorias', $categoriaPadre->id));
});


//? Home / Categorias / Tienda / Categoria (La subcategoria seleccionada)  Miga de pan 7
Breadcrumbs::for('productosConSubcategoria', function (BreadcrumbTrail $trail, $categoriaPadre, $subcategoria) {
    $trail->parent('category.subcategorias', $categoriaPadre);
    $trail->push($subcategoria->nombre, route('productosConSubcategoria', $subcategoria->id));
});


//! Para mostrar la ruta en el producto ProductOverviews
//? Home / Categorias / Tienda / Oferta / NombreProducto Miga de pan 8 
Breadcrumbs::for('productOverviews', function (BreadcrumbTrail $trail, $categoriaPadre, $subcategoria, $producto) {
    $trail->parent('productosConSubcategoria', $categoriaPadre, $subcategoria);
    $trail->push($producto->nombre, route('overviewProduct', $producto->id));
});

//todo Fin link categorias del nav


//todo Gestionar productos

//? Home / Gestion de productos (Solo para admins) Miga de pan 9
Breadcrumbs::for('gestion_productos', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Gestionar Productos', route('products.principal'));
});


//? Home / Gestion de productos / Crear Producto Miga de pan 10

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('gestion_productos');
    $trail->push('Crear Producto', route('products.create'));
});


//? Home / Gestion de productos / Actualizando Producto nombreProducto Miga de pan 11

Breadcrumbs::for('products.update', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('gestion_productos');
    $trail->push('Actualizando el producto '  . $product -> nombre, route('products.update', $product->id));
});

//todo Fin Gestionar productos


//todo Gestionar usuarios

//? Home / Gestión de usuarios (Solo para admins) Miga de pan 12

Breadcrumbs::for('gestion_usuarios', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Gestionar Usuarios', route('tableUser'));
});

//? Home / Gestión de usuarios / Actualizando Usuario nombreUsuario Miga de pan 13

Breadcrumbs::for('users.update', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('gestion_usuarios');
    $trail->push('Actualizando el usuario '  . $user -> name, route('users.update', $user->id));
});

//todo Fin Gestionar usuarios


//todo Ver likes
//? Home / Tus productos favoritos de pan 14

Breadcrumbs::for('visualizar_favoritos', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tus productos favoritos', route('verLikes')); //? Seria como ver Favoritos pero lo voy a dejar asi
});

//todo Fin Ver likes








/* // Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
}); */




