<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //

    public function redirect(){
        return Socialite::driver('google')->redirect();

    }



    public function callback(){

        $user_google = Socialite::driver('google')->stateless()->user();

        //dd($user_google);
        //todo Busca al usuario por su correo electrónico, saca el primero que encuentre gracias a firtst
        $user = User::where('email', $user_google->email)->first();
    
    
        if ($user) {
            //? Si el usuario ya existe, actualiza su google_id y avatar si fuese necesario
            $user->update([
                'google_id' => $user_google->id,
                
            ]);
        } else {
            //? Si el usuario no existe, crea uno nuevo
            $user = User::create([
                'google_id' => $user_google->id,
                'name' => $user_google->name,
                'email' => $user_google->email,
            ]);
        }
    
        Auth::login($user);
    
        return redirect('/dashboard');

    }

}
