<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PrincipalCategory extends Component
{
    use WithPagination;
    public string $buscar="";
    public string $orden="asc";
    public string $campo ="id";
    public function render()
    {
        $categorias = Category::orderBy($this -> campo , $this -> orden)
        ->where('nombre' , 'like' , "$this->buscar%")
        -> paginate(5);
        return view('livewire.principal-category' , compact('categorias'));
    }

    //todo Para el buscador
 public function updatingBuscar(){
    $this -> resetPage();
}


    //todo Para borrar una categoria

    public function pedirConfirmacion( Category $categoria){

        //dd($product -> id . "-" . auth() -> user() -> id);
        
        $this -> dispatch('confirmarDeleteCategory' , $categoria -> id); //todo Este evento, lo va a escucahr app.blade.php
        
    }


    #[On('deleteConfirmado')]

    public function delete(Category $categoria){

        $categoria -> delete();

        $this -> dispatch('mensaje' , 'Categoria borrada correctamente');

    }

}
