<x-app-layout>
    <x-propio>
        
      {{-- ? LAS RESEÑAS SE CREAN 4 de mayo bien por fin el borrado de imagenes y subidas funciona porfin ssssiuuu --}}
        <div class="my-5 mx-5">
            <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="flex justify-center">
                    <img class=" mr-2 object-cover object-center rounded-lg h-20"
                        src="{{ Storage::url($product->primeraImagen->url_imagen) }}"
                        alt="{{ $product->primeraImagen->desc_imagen }}">
                    <span class="flex text-xl items-center">Estás haciendo una reseña para el producto
                        {{ $product->nombre }}</span>
                    <input type="hidden" name="product_id" value="{{ $product->id }}"> {{-- ? le paso el id del producto por un campo oculto --}}
                </div>
                <!-- Valoración general con estrellas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Valoración general</label>
                    <div id="rating" class="flex">
                        <!-- Generación de las estrellas -->
                        @for ($i = 1; $i <= 5; $i++)
                            <i name="puntuacion" class="far fa-star text-yellow-400 text-xl cursor-pointer"
                                onclick="valoracionEstrellas(this, {{ $i }})"></i>
                        @endfor
                        <input type="hidden" id="puntuacion" name="puntuacion" value="{{ old('puntuacion') }}">
                        {{-- ! campo oculto para las estrellas --}}
                        <div class="flex font-bold mt-1 ml-5 justify-center">
                            <x-input-error for="puntuacion"></x-input-error>
                        </div>
                    </div>


                    <!-- Campo para el título de la reseña -->
                    <div class="my-3">
                        <div class="flex flex-col">
                            <label for="titulo" class="text-lg font-semibold text-gray-900">Añade un título</label>
                            <input type="text" id="titulo" value="{{ old('titulo') }}" name="titulo"
                                placeholder="Titutlo de la reseña"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <x-input-error for="titulo"></x-input-error>
                        </div>

                        <!-- Sección para la reseña escrita -->
                        <div class="flex flex-col">
                            <label for="reseña" class="text-lg font-semibold text-gray-900">Añadir una reseña
                                escrita</label>
                            <textarea id="reseña" name="reseña" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Escribe tu{{ old('') }} experiencia con el producto...">{{ old('reseña') }}</textarea>
                            <x-input-error for="reseña"></x-input-error>
                        </div>

                        <!-- Sección para añadir pros -->
                        <div class="flex flex-col">
                            <label for="pros" class="text-lg font-semibold text-gray-900">Pros</label>
                            <textarea id="pros" name="pros" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Lo que te gustó del producto">{{ old('pros') }}</textarea>
                            <x-input-error for="pros"></x-input-error>
                        </div>

                        <!-- Sección para añadir contras -->
                        <div class="flex flex-col">
                            <label for="contras" class="text-lg font-semibold text-gray-900">Contras</label>
                            <textarea id="contras" name="contras" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Lo que no te gustó del producto">{{ old('contras') }}</textarea>
                            <x-input-error for="contras"></x-input-error>
                        </div>


                        <!-- Subida de imagen o video -->
                        <div class="flex flex-col">
                            <label class="block">
                                <span class="sr-only">Añadir una foto o video</span>
                                <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        {{-- <lord-icon src="https://cdn.lordicon.com/zrkkrrpl.json" trigger="hover"
                                            colors="primary:#c69cf4,secondary:#a866ee" style="width:110px;height:150px">
                                        </lord-icon> --}}
                                         <lord-icon
                                             src="https://cdn.lordicon.com/zrkkrrpl.json"
                                             trigger="hover"
                                             state="hover-swirl"
                                             colors="primary:#c69cf4,secondary:#242424"
                                             style="width:110px;height:150px">
                                         </lord-icon>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                

                                                <span>Subir un archivo</span>
                                                <input id="file-upload" name="imagen[]" type="file" multiple
                                                    accept="image/*" class="sr-only" onchange="previewFiles()">
                                            </label>
                                            <p class="pl-1">o arrastra y suelta</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF .WEBP hasta 2048MB
                                        </p>
                                    </div>
                                </div>
                            </label>
                        </div>
                        
                        
                        
                        <x-input-error for="imagen"></x-input-error>

                        <div id="contenedor-preview" class="flex flex-wrap mt-4">
                            {{-- ! <!-- Las vistas previas de los archivos se mostrarán aquí --> --}}
                        </div>


                        <div class="flex flex-row-reverse flex-wrap">
                            <button type="submit" name="btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                                <i class="fas fa-save mr-1 text-xl"></i>Crear
                            </button>
                            <button type="reset"
                                class="mr-2 text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                                <i class="fas fa-paintbrush mr-1 text-xl"></i>Limpiar campos
                            </button>
                            <a href="{{ route('products.principal') }}"
                                class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                                <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
                            </a>
                        </div>
            </form>
        </div>
    </x-propio>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const estrellasIniciales = document.getElementById('puntuacion').value; // Obtiene el valor inicial
            if (estrellasIniciales) {
                valoracionEstrellas(null, estrellasIniciales); // Establece las estrellas al cargar la página
            }
        });

        function valoracionEstrellas(starElement, rangoEstrellas) {
            let estrellas = document.querySelectorAll('#rating .fa-star');
            let inputPuntuacion = document.getElementById('puntuacion');
            //? Primero establecemos las estrellas a far (no estan rellenas)
            estrellas.forEach(estrella => {
                estrella.classList.remove('fas');
                estrella.classList.add('far');
            });
            //? Recorre todas las estrellas y las rellena hasta el rango seleccionado
            for (let i = 0; i < rangoEstrellas; i++) {
                estrellas[i].classList.remove('far');
                estrellas[i].classList.add('fas');
            }

            //? Actualizamos el valor del campo oculto con el rango de estrellas seleccionadas (1 estrella, 2 estrellas, etc., segun las que seleccione el usuario).
            inputPuntuacion.value = rangoEstrellas;
        }
    </script>
    






    {{-- ! script para las imagenes --}}
    <script>
        let archivos = []; // Almacena todos los archivos seleccionados
    
        function previewFiles() {
            const inputLoadArchivos = document.getElementById('file-upload');
            // Agrega nuevos archivos al array solo si no existen aún (comprobando nombre y tamaño para simplificación).
            Array.from(inputLoadArchivos.files).forEach(file => {
                if (!archivos.some(f => f.name === file.name && f.size === file.size)) {
                    archivos.push(file);
                }
            });
            updatePreviews();
            syncInputFiles();
        }
    
        function updatePreviews() {
            const contenedorPreview = document.getElementById('contenedor-preview');
            contenedorPreview.innerHTML = ''; // Limpiar vistas previas existentes
    
            archivos.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative w-full md:w-1/3 p-1';
    
                    const img = new Image();
                    img.src = event.target.result;
                    img.className = 'object-cover h-48 w-full rounded-lg';
    
                    const botonBorrarImg = document.createElement('button');
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                    botonBorrarImg.onclick = () => {
                        archivos.splice(index, 1);
                        updatePreviews();
                        syncInputFiles();
                    };
    
                    imgDiv.appendChild(img);
                    imgDiv.appendChild(botonBorrarImg);
                    contenedorPreview.appendChild(imgDiv);
                };
                reader.readAsDataURL(file);
            });
        }
    
        function syncInputFiles() {
            const dataTransfer = new DataTransfer();
            archivos.forEach(file => dataTransfer.items.add(file));
            document.getElementById('file-upload').files = dataTransfer.files;
        }
    
        document.querySelector('form').addEventListener('submit', function(event) {
            syncInputFiles();
        });
    
        /* document.getElementById('file-upload').addEventListener('change', previewFiles); */
    </script>
    



    {{-- ? Para arrastrar las imagenes --}}

    <script>
        //? Seleccionamos el área de arrastre usando la clase del div.
        const areaArrastre = document.querySelector('.border-dashed');
        
        //? Evento que se dispara cuando un archivo es arrastrado sobre el área.
        areaArrastre.addEventListener('dragover', (evento) => {
            evento.stopPropagation(); //? Detiene la propagacion del evento.
            evento.preventDefault();  //? Evita el comportamiento por defecto del navegador.
            //? Cambia el color del borde como indicación visual.
            evento.currentTarget.style.borderColor = '#a866ee';
        });
    
        //? Evento que se dispara cuando los archivos son soltados en el área.
        areaArrastre.addEventListener('drop', (evento) => {
            evento.stopPropagation(); //? Detiene la propagacion del evento.
            evento.preventDefault();  //? Evita el comportamiento por defecto del navegador (importante hacerlo ).
            //? Asigna los archivos al input de archivo.
            document.getElementById('file-upload').files = evento.dataTransfer.files;
            //? Llama a la función de vista previa que esta en el otro script {{-- ! script para las imagenes --}} en este
            previewFiles();
        });
    
        //? Evento que se dispara cuando un archivo deja el area de arrastre.
        areaArrastre.addEventListener('dragleave', (evento) => {
            //? Restablece el color del borde al original.
            evento.currentTarget.style.borderColor = '#c69cf4';
        });
    </script>
    




    {{-- ! para los videos --}}
    {{-- <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
      <script defer src="https://unpkg.com/video.js/dist/video.js"></script>      --}}

</x-app-layout>
