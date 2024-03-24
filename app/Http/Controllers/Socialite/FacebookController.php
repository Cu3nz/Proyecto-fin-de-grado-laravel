<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //

    public function redirect(){
        return Socialite::driver('facebook')->redirect();

    }


    public function callback(){

        $facebookUser = Socialite::driver('github')->user();

        //todo Si existe en la base de datos recoge el email del usuario, ahora si no existe en la base de datos lo crea, por eso usamos firstOrCreate

        //* first encuentra el primer registro con el email del usuario que se esta logueando
        //* si no encuentra ningun registro con el email del usuario que se esta logueando, entonces crea un nuevo registro con el email del usuario que se esta logueando, por eso Create

        $user = User::firstOrCreate([
            'email' => $facebookUser -> getEmail(),
        ], [
            'name' => $facebookUser -> getName()
        ]);
     
        Auth::login($user);
     
        return redirect('/dashboard');

    }

}
