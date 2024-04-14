<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Rules\Role;

class UserController extends Controller
{
    //



    public function edit(User $user)
    {
          $roles = ['superAdmin', 'admin', 'user']; //todo Roles que puede tener un usuario

        return view('users.update' , compact('user' , 'roles'));
    }


    public function update(Request $request, User $user)
{

    //? Verifico si el usuario si se esta intetando modificar el usuario root, si es asi, mensaje de error.
    if ($user->email === 'nombretienda@gmail.com') {
        return back()->withErrors(['error' => 'No está permitido modificar el usuario root.']);
    }

    //? Verifico si el usuario esta intentnando modificar su propio perfil con el que ha iniciado sesion, si es asi, mensaje de error
    if (auth()->id() == $user->id) {
        abort(400, 'ERROR!!! No puedes modificar tu propio perfil con el que has iniciado sesion.');

    }

    $request->validate([
        'name' => 'required|string|min:4',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'rol' => 'nullable|in:superAdmin,admin,user',
    ]);

    $input = $request->all();

    //? Si el campo de contraseña esta vacio, no actualizo la contraseña.
    if (empty($input['password'])) {
        $data = $request->except('password');
    } else {
        $data = $request->all();
        $data['password'] = Hash::make($input['password']);  // Asegura de hashear la nueva contraseña
    }

    //todo Comprobamos si el rol del usuario esta cambiando a 'user' desde 'admin' o 'superAdmin'
    // Antes de intentar acceder a $input['rol'], comprueba si está establecido.
if (isset($input['rol']) && $user->rol !== 'user' && $input['rol'] === 'user') {
    $this->reasignarProductosAOtroAdmin($user);
}

    $user->update($data);

    return redirect()->route('tableUser')->with('mensaje', 'Usuario actualizado correctamente');
}

/** 
 * todo  Reasigna los productos de un usuario a otro administrador o superAdministrador cuando el user admin se cambia a user normal.
 */
protected function reasignarProductosAOtroAdmin(User $usuario)
{
    //? Buscar otro administrador o superAdministrador al azar que no sea el usuario actual
    $adminReemplazo = User::where('rol', '!=', 'user')->where('id', '!=', $usuario->id)->inRandomOrder()->first();

    if (!$adminReemplazo) {
        // ?Si no hay ningun  administrador disponible muestro el siguiente mensaje.
        abort(422, 'No hay ningún administrador o superAdministrador disponible para reasignar los productos.');
    }

    //* Cambiar el propietario de los productos al nuevo administrador
    foreach ($usuario->products as $product) {
        $product->user_id = $adminReemplazo->id;
        $product->save();
    }
}

    


   /*  public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'rol' => 'nullable|in:superAdmin,admin,user',
        ]);
    
        $input = $request->all();
    
        // Si el campo de contraseña está vacío, no actualices la contraseña.
        if (empty($input['password'])) {
            $data = $request->except('password');
        } else {
            $data = $request->all();
            $data['password'] = Hash::make($input['password']);  // Asegura de hashear la nueva contraseña
        }
        
    
        $user->update($data);
    
        return redirect()->route('tableUser')->with('mensaje', 'Usuario actualizado correctamente');
    } */
    
    


}
