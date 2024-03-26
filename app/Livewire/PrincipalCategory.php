<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Storage;
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
        $categorias = Category::with('image')
        ->where('nombre', 'like', "%{$this->buscar}%")
        ->orderBy($this->campo, $this->orden)
        ->paginate(5);
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

    public function delete(Category $categoria)
    {
        // Primero, borra todas las categorías hijas y sus imágenes asociadas si es una categoría padre.
        if ($categoria->es_padre) {
            foreach ($categoria->children as $subcategoria) {
                // Borra la imagen de la subcategoría si existe y no es la imagen por defecto.
                if ($subcategoria->image && basename($subcategoria->image->url_imagen) != 'noimage.png') {
                    Storage::delete($subcategoria->image->url_imagen);
                }
                // Elimina las imágenes asociadas de las subcategorías.
                $subcategoria->image()->delete();
                // Borra la subcategoría.
                $subcategoria->delete();
            }
        }
    
        // Borra la imagen de la categoría si existe y no es la imagen por defecto.
        if ($categoria->image && basename($categoria->image->url_imagen) != 'noimage.png') {
            Storage::delete($categoria->image->url_imagen);
        }
    
        // Elimina la imagen asociada si existe.
        if ($categoria->image) {
            $categoria->image()->delete();
        }
    
        // Finalmente, elimina la categoría.
        $categoria->delete();


        $this -> dispatch('mensaje' , 'Categoria borrada correctamente');
    
        
        
    }
    

}
