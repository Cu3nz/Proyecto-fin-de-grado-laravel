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

        $productos = Product::query()
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.nombre', 'like', "%{$this->buscar}%")
        ->orWhere('products.descripcion', 'like', "%{$this->buscar}%")
        ->orWhere('products.codigo_articulo', 'like', "%{$this->buscar}%")
        ->orWhere('products.estado', 'like', "%{$this->buscar}%")
        ->orWhere('categories.nombre', 'like', "%{$this->buscar}%")
        ->select('products.*')
        ->orderBy('products.' . $this->campo, $this->orden)
        ->paginate(5);
       /*  $productos = Product::orderBy($this -> campo , $this -> orden)
        ->where('nombre' , 'like' , "$this->buscar%")
        ->orWhere('descripcion' , 'like' , "$this->buscar%")
        ->orWhere('codigo_articulo' , 'like' , "$this->buscar%")
        ->orWhere('estado' , 'like' , "$this->buscar%")
        ->paginate(5); */
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

        /* dd($product->images); */ //? Muestra todas las imagenes que tiene el producto

        

        $imagenesActualProducto = $product -> images; //? Guardamos en $imagenesActualProducto, todos los atibutos de la tabla images del producto en cuestion (id , url_imagen , desc_imagen , imaginable type , imaginable_id , created_at , updated_at)

        /* dd($imagenesActualProducto); */ //? Esto imprime un array con todos los atributos de la tabla images del producto en cuestion su id , url_imagen , desc_imagen , imaginable type , imaginable_id , created_at , updated_at

        //dd($imagenesActualProducto -> pluck('url_imagen')); //? Esto imprime un array con todas las imagenes del producto en cuestion

        //todo Tenemos que comprobar cada una de las imagenes del producto en cuestion y eliminarlas si es son distintas a default.jpg
        foreach($imagenesActualProducto as $imagenProducto){

            if(basename($imagenProducto -> url_imagen) != 'noimage.png'){ //? accedemos a la imagen mediante el atributo url_imagen que esta en la tabla images.
                Storage::delete($imagenProducto -> url_imagen);
            }

            $imagenProducto -> delete(); //? Eliminamos el registro de la tabla product_images
        }

        $product -> delete();

        $this -> dispatch('mensaje' , 'Producto borrado correctamente');

    }


}
