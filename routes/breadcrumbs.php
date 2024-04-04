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
    $trail->push('Gestion Categorias', route('Category.principal'));
});

//? Home / Gestion de categorias / Actualizando la Categoria Nombre categoria actualizando Miga de pan 3
Breadcrumbs::for('category.update', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('gestion_categorias');
    // Asegúrate de que $category->name es una cadena. Si es null, proporciona un valor predeterminado.
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


//? Home / Categorias / Tienda (La subcategoria seleccionada)  Miga de pan 6
Breadcrumbs::for('category.subcategorias', function (BreadcrumbTrail $trail, $categoriaPadre) {
    // Este es el breadcrumb para la página índice de categorías
    $trail->parent('category.index');
    // Añade el breadcrumb para la categoría específica
    $trail->push($categoriaPadre->nombre, route('category.subcategorias', $categoriaPadre->id));
});


//? Home / Categorias / Tienda / Categoria (La subcategoria seleccionada)  Miga de pan 7
Breadcrumbs::for('productosConSubcategoria', function (BreadcrumbTrail $trail, $categoriaPadre, $subcategoria) {
    // Se asume que 'category.subcategorias' ya lleva a la categoría padre (Tienda)
    $trail->parent('category.subcategorias', $categoriaPadre);
    // Aquí, 'subcategoria' es la variable que anteriormente llamabas 'idDeSubcategoria'
    $trail->push($subcategoria->nombre, route('productosConSubcategoria', $subcategoria->id));
});


//todo Fin link categorias del nav






/* // Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
}); */




