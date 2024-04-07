<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChekearRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!auth()->check()) { //? Si no estoy logueado, no voy a poder ver ninguna de las paginas, por lo tanto me lleva a login
            /* return redirect()->route('login'); */
            abort(403, 'No tienes permisos para acceder a esta página');
        }

        if (auth()->user()->rol != 'superAdmin' && auth()->user()->rol != 'admin') {
            abort(403, 'No tienes permisos para acceder a esta página');
        }
        

        return $next($request);
    }
}
