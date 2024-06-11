<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BtnDeleteImgDiv extends Component
{

    public $imageable_id; //? Es el id del producto o de la reseña que se esta editando
    public $imageable_type; //? Es el tipo de modelo que se esta editando
    public $imagenesModelo; //? Recoge todos los registros de la tabla images que pertenecen al producto o a la reseña que se esta editando

    public function mount($imageable_id, $imageable_type)
    {
        $this->imageable_id = $imageable_id;
        $this->imageable_type = $imageable_type;
        $this->loadImages();
    }

    public function loadImages()
    {
        $this->imagenesModelo = Image::where('imageable_id', $this->imageable_id)
            ->where('imageable_type', $this->imageable_type)
            ->get();
    }

    public function removeImage($imagenID)
    {
        //dd($imagenID); //? ID de la imagen a eliminar que esta en la tabla images
        $imagenesUpdateProduct = Image::findOrFail($imagenID); //? Busco  y recupero todo el registro que tiene la id que paso por parametro en la tabla images
        //dd($imagenesUpdateProduct);

        /**
         * @param $imagenesUpdateProduct Almacena el resgistro de la imaagen que se va a eliminar, este registro tiene un atributo
         * llamado imageable_id que es el id del producto al que pertenece la imagen, por lo tanto si imagenesUpdateProduct devuelve id imageable_id 23, las imagenes cargadas en la tabla images es del product con id 23.
         * todo $imagenesUpdateProduct -> imageable_id  Busca en la tabla products el producto o el registro con id 23
         */
        $producto = Product::findOrFail($imagenesUpdateProduct -> imageable_id );
        //dd($producto);

        if ($imagenesUpdateProduct) {
            if (basename($imagenesUpdateProduct->url_imagen) != 'noimage.png') {
                Storage::delete($imagenesUpdateProduct->url_imagen);
            }
            $imagenesUpdateProduct->delete();

            //? Segun el tipo de modelo que se este ediatando se envia un mensaje diferente
            if ($this->imageable_type === 'App\Models\Product') {
                $this->dispatch('ProductImgEliminado', 'Imagen del producto ' . $producto -> nombre. ' eliminada correctamente.');
            } elseif ($this->imageable_type === 'App\Models\Review') {
                $this->dispatch('ProductImgEliminado', 'Imagen eliminada correctamente de la reseña.');
                
            }
            //? Recargo las imagenes del producto
            $this->loadImages();
        }
    }

    public function render()
    {
        return view('livewire.btn-delete-img-div' , ['imagenesModelo' => $this->imagenesModelo]);
    }
}
