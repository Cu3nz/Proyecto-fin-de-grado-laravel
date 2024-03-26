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
    // En PrincipalCategory.php
    public function delete(Category $category)
    {
        //? Si es una categoria padre, elimina todas las subcategorias primero
        if ($category->es_padre) {
            foreach ($category->children as $child) {
                $this->delete($child); //* Llamada recursiva para borrar las subcategorias
            }
        }

        //? Elimina los productos asociados a la categoría
        foreach ($category->products as $product) {
            //* Elimina todas las imagenes asociadas a este producto de la carpeta imagen y de la base de datos
            foreach ($product->images as $image) {
                Storage::delete($image->url_imagen); //? Elimino las imagenes de la carpeta imagen
                $image->delete(); //* Elimina el registro de la tabla images
            }
            $product->delete(); //* Elimina el producto de la tabla products
        }

        //? Elimina la imagen asociada a la categoria si no es la imagen por defecto
        if ($category->image) {
            if (basename($category->image->url_imagen) != 'noimage.png') {
                Storage::delete($category->image->url_imagen);
            }
            $category->image()->delete(); //* Elimina el registro de la categoria de la tabla images
        }

        //* Elimina la categoria de la tabla categories
        $category->delete();
    }

    

}
