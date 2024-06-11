<div>
    <section id="contenedor-imagenes-existentes" class="flex w-full flex-wrap mt-4">
        @foreach ($imagenesModelo as $imagen)
            <div class="relative w-full md:w-1/3 p-1 image-container-{{ $imagen->id }}">
                <img class="imagenes-existentes object-cover h-48 md:h-64 w-full rounded-lg" src="{{ Storage::url($imagen->url_imagen) }}" alt="{{ $imagen->desc_imagen }}">
                <button wire:click.prevent="removeImage({{ $imagen->id }})" class="absolute bottom-2 right-2 text-red-500 flex  items-center rounded-full shadow-lg delete-button" aria-label="Eliminar el producto ">
                    <lord-icon
                        src="https://cdn.lordicon.com/drxwpfop.json"
                        trigger="morph"
                        state="morph-trash-in"
                        colors="primary:#c71f16,secondary:#e83a30"
                        style="width:40px;height:50px">
                    </lord-icon>
                    {{-- <i class="fas fa-trash text-red-600"></i> --}}
                </button>
            </div>
        @endforeach
    </section>
</div>
