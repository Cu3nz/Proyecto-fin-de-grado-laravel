<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TablaUsers extends Component
{

    use WithPagination;
    

    public string $buscar = "";
    public string $orden = "desc";
    public string $campo = "id";

    public function render()
    {

       /*  $User = User::orderBy($this -> campo, $this -> orden)
            ->where('name', 'like', "{$this->buscar}%")
            ->orWhere('email', 'like', "{$this->buscar}%")
            ->paginate(5); */

            $User = User::orderBy($this->campo, $this->orden)
            ->where(function ($query) {
                $query->where('name', 'like', "%{$this->buscar}%")
                      ->orWhere('email', 'like', "%{$this->buscar}%");
            })
            ->paginate(5);


        return view('livewire.tabla-users', compact('User'));
    }



    public function updatingBuscar()
    {
        $this->resetPage();
    }



    public function pedirConfirmacion(User $user)
    {

        $this->dispatch('confirmarDeleteUser', $user->id); //todo Este evento, lo va a escucahr app.blade.php

    }


    #[On('deleteConfirmado')]
    public function delete(User $usuario)
    {
        //? No permitir borrar el usuario root
        if ($usuario->email == 'nombretienda@gmail.com') {
            abort(403, 'El usuario root no puede ser eliminado.');
        }
    
        //? Guarda la imagen de perfil que tiene el usuario
        $rutaImagenPerfil = $usuario->profile_photo_path;
    
        //? Verifico que exista la imagen de perfil y que no sea la imagen por defecto
        if ($rutaImagenPerfil && $rutaImagenPerfil != 'noimage.png') {
            //* Borra la imagen
            Storage::delete($rutaImagenPerfil);
        }
    
        //? Busco un administrador o superAdministrador que no sea el usuario actual para reasignar los productos
        $idAdminReemplazo = User::where('rol', 'admin')->where('id', '!=', $usuario->id)->first()->id ??
                            User::where('rol', 'superAdmin')->where('id', '!=', $usuario->id)->first()->id ?? null;
    
        //? Si no hay ningun administrador o superAdministrador disponible para reasignar los productos y el usuario tiene productos
        if (!$idAdminReemplazo && $usuario->products()->count() > 0) {
            abort(422, 'No hay ningún administrador o superAdministrador disponible para reasignar los productos.');
        }
    
        //? Reasigna los productos del usuario a otro administrador o superAdministrador, en el caso de que esten todos borrados, se asignaran al usuario "root" que es el que tiene el email de la tienda
        if ($idAdminReemplazo) {
            $usuario->products()->update(['user_id' => $idAdminReemplazo]);
        }
    
        //? Borro el usuario
        $usuario->delete();
    
        $this->dispatch('mensaje', 'Usuario eliminado y sus productos reasignados correctamente.');
    }
    





    /* #[On('deleteConfirmado')]
public function delete(User $usuario)
{

     //? No permitir borrar el usuario root
     if ($usuario->email == 'nombretienda@gmail.com') {
        abort(403, 'El usuario root no puede ser eliminado.');
    }

    //? Guardo la imagen de perfil que tiene el usuario 
    $rutaImagenPerfil = $usuario->profile_photo_path;

    //? Verifico que exista la imagen de perfil  y que la imagen de perfil no sea la imagen por defecto
    if ($rutaImagenPerfil && $rutaImagenPerfil != 'noimage.png') {
        //* Borro la imagen
        Storage::delete($rutaImagenPerfil);
    }

    //? Cuento cuantos administradores y superAdministradores hay en total
    $totalAdminsSuperAdmins = User::whereIn('rol', ['admin', 'superAdmin'])->count();

    //? Si el usuario que intento borrar es el ultimo Admin o SuperAdmin, no se permite que se borre , solucion asignar un usuario como admin
    //todo El motivo de < 1 es para que me deje borrar usuarios normales teniendo un usuario admin
    //todo Si pongo <= 1 tengo que tener 2 usuarios admin para poder borrar un usuario normal.
    if ($totalAdminsSuperAdmins < 1) {
        abort(422, 'No puedes eliminar al último administrador o superAdministrador.');
    }

    //? Busco un administrador que no sea el usuario actual
    $idAdminReemplazo = User::where('rol', 'admin')->where('id', '!=', $usuario->id)->first()->id ?? null;

    //? Si no hay otros administradores, busca un superAdministrador
    if (!$idAdminReemplazo) {
        $idAdminReemplazo = User::where('rol', 'superAdmin')->where('id', '!=', $usuario->id)->first()->id ?? null;
    }

    //todo Si intento borrar el unico administrador que hay disponible salta el siguiente error, porque no reasignar los productos a otro administrador y ese usuario tiene a cargo todos los productos
    if (!$idAdminReemplazo && $usuario->products()->count() > 0) {
        abort(422, 'No hay ningún administrador o superAdministrador disponible para reasignar los productos.');
    }

    //* Reasigna los productos del usuario a otro administrador o superAdministrador
    if ($idAdminReemplazo) {
        $usuario->products()->update(['user_id' => $idAdminReemplazo]);
    }

    //* Borra el usuario
    $usuario->delete();

    
    $this->dispatch('mensaje', 'Usuario y sus productos reasignados y borrados correctamente.');
} */

    

}
