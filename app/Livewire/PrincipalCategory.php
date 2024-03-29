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
            foreach ($category->children as $child) { //? Busca las subcategorias de la categoria padre y acto seguido las elimina
                /* $nombresSubcategorias = $category->children->pluck('nombre'); */
                /* dd($nombresSubcategorias); //? Imprime los nombres de las subcategorias */
                $this->delete($child); //* Llamada recursiva para borrar las subcategorias
            }
        }

        //? Elimina los productos asociados a la categoría
        $nombreProductoConCategoria = [];
        foreach ($category->products as $product) { //? Recorre los productos asociados a la categoria padre que quiero borrar, imprimiendo los nombres de los productos que tienen una subcategoria de la categoria padre. Ejemplo: padre 5 y de la padre sale la 6 y 7  y 2 productos tienen la subcategoria 6 y 7, esos son los que se van a mostrar
            $nombreProductoConCategoria[] = $product->nombre; //? Guarda el nombre del producto que se va a eliminar
            //* Elimina todas las imagenes asociadas a este producto de la carpeta imagen y de la base de datos
            foreach ($product->images as $image) { //? Recorre las imagenes del producto
                if (basename($image->url_imagen) != 'noimage.png') { //* Comprueba que la imagen no sea la imagen por defecto antes de eliminar las imagenes del producto
                    Storage::delete($image->url_imagen); //? Elimino las imagenes de la carpeta imagen
                }
                $image->delete(); //* Elimina el registro de la tabla images
            }
            $product->delete(); //* Elimina el producto de la tabla products
        }
        /* dd($nombreProductoConCategoria); //? Imprime los nombres de los productos que se van a eliminar por tener asociada la categoria la cual quiero borrar */

        //? Elimina la imagen asociada a la categoria si no es la imagen por defecto
        if ($category->image) {
            if (basename($category->image->url_imagen) != 'noimage.png') {
                Storage::delete($category->image->url_imagen);
            }
            $category->image()->delete(); //* Elimina el registro de la categoria de la tabla images
        }

        //* Elimina la categoria de la tabla categories
        $category->delete();
        
        $this -> dispatch('mensaje' , 'Categoria borrada correctamente');
    }


    

}
