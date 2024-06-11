<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //todo Defino la politica que hace que un usuario no borre productos de otro usuario, SOLO PUEDE BORRAR SUS PRODUCTOS
         //? Para que no se pueda eliminar un producto que no sea tuyo. 
         Gate::define('removeProductCarrito' , function(User $user , ShoppingCart $product){
            //* Dejara borrar el producto si el user -> id que se ha registrado es igual al user_id del producto
            return $user->id === $product->user_id;
        });
    }
}
