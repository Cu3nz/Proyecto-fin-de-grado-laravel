<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class PrincipalProducts extends Component
{

    use WithPagination;

    public string $buscar = "";
    public string $orden="desc";
    public string $campo ="id";

    //todo Para cambiar el estado

    public string $estado = "";
    
    public function render()
    {
        $productos = Product::orderBy($this -> campo , $this -> orden)
        ->where('nombre' , 'like' , "$this->buscar%")
        ->orWhere('descripcion' , 'like' , "$this->buscar%")
        ->orWhere('codigo_articulo' , 'like' , "$this->buscar%")
        ->orWhere('estado' , 'like' , "$this->buscar%")
        ->paginate(5);
        return view('livewire.principal-products' , compact('productos'));
    }

    public function updatingBuscar(){
        $this -> resetPage();
    }

    //todo Para ordenar por campo

    public function ordenar($campo){
        $this -> orden = ($this -> orden == 'asc') ? 'desc' : 'asc';

        $this -> campo = $campo;

    }


    //todo Cambiar estado del producto con un click

    public function cambiarDisponibilidadClick(Product $producto){

        $estado = ($producto -> estado == 'DISPONIBLE') ? 'NO DISPONIBLE' : 'DISPONIBLE'; //? Guardamos en $estado, el estado actual que tiene el producto al cual se ha hecho click, si el estado es DISPONIBLE lo ponemos en NO DISPONIBLE y si esta en NO DISPONIBLE lo ponemos en DISPONIBLE

        //? Actualizamos el estado del producto
        $producto -> update([
            'estado' => $estado
        ]);
    }


    public function subirStock(Product $product){

        $stockActual = $product -> stock;

        $stockActual += 1;

        $product -> update([
            'stock' => $stockActual
        ]);
            

    }

    public function bajarStock(Product $product){

        if ($product -> stock > 0){
            $stockActual = $product -> stock;

            $stockActual -= 1;

            $product -> update([
                'stock' => $stockActual
            ]);
        }
    }



    public function pedirConfirmacion(Product $product){
        $this -> dispatch('confirmarDeleteProduct' , $product -> id); //todo Este evento, lo va a escucahr app.blade.php
    }

    #[On('deleteConfirmado')]
    public function delete (Product $product){

        $imagenActualProducto = $product -> imagen;

        if (basename($imagenActualProducto) != 'noimage.png'){
            Storage::delete($imagenActualProducto);
        }

        $product -> delete();

        $this -> dispatch('mensaje' , 'Producto borrado correctamente');

    }


}
