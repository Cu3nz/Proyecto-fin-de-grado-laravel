<x-app-layout>
    <x-propio>
        {{-- ! estoy en producccin revisar y subir a github jeje  --}}
      {{-- ! 13 de mayo 2:23 revisar mañaan a las 6 am --}}
        
      
        <div class="my-5 mx-5">
            <form action="{{ route('reviews.update' , $review -> id) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="flex justify-center">
                    <img class=" mr-2 object-cover object-center rounded-lg h-20"
                        src="{{ Storage::url($product->primeraImagen->url_imagen) }}"
                        alt="{{ $product->primeraImagen->desc_imagen }}">
                    <span class="flex text-xl items-center">Estás actualizando la reseña para el producto
                        <span class="font-bold ml-1">{{ $product->nombre }}</span></span>
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
                        <input type="hidden" id="puntuacion" name="puntuacion" value="{{ old('puntuacion' , $review -> puntuacion) }}">
                        {{-- ! campo oculto para las estrellas --}}
                        <div class="flex font-bold mt-1 ml-5 justify-center">
                            <x-input-error for="puntuacion"></x-input-error>
                        </div>
                    </div>


                    <!-- Campo para el título de la reseña -->
                    <div class="my-3">
                        <div class="flex flex-col">
                            <label for="titulo" class="text-lg font-semibold text-gray-900">Añade un título</label>
                            <input type="text" id="titulo" value="{{ old('titulo' , $review -> titulo) }}" name="titulo"
                                placeholder="Titutlo de la reseña"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <x-input-error for="titulo"></x-input-error>
                        </div>

                        <!-- Sección para la reseña escrita -->
                        <div class="flex flex-col">
                            <label for="reseña" class="text-lg font-semibold text-gray-900">Añadir una reseña
                                escrita</label>
                            <textarea id="reseña" name="reseña" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Escribe tu experiencia con el producto...">{{ old('reseña' , $review -> reseña) }}</textarea>
                            <x-input-error for="reseña"></x-input-error>
                        </div>

                        <!-- Sección para añadir pros -->
                        <div class="flex flex-col">
                            <label for="pros" class="text-lg font-semibold text-gray-900">Pros</label>
                            <textarea id="pros" name="pros" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Lo que te gustó del producto">{{ old('pros' , $review -> pros) }}</textarea>
                            <x-input-error for="pros"></x-input-error>
                        </div>

                        <!-- Sección para añadir contras -->
                        <div class="flex flex-col">
                            <label for="contras" class="text-lg font-semibold text-gray-900">Contras</label>
                            <textarea id="contras" name="contras" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Lo que no te gustó del producto">{{ old('contras' , $review -> contras) }}</textarea>
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
                                                    accept="image/*" class="" onchange="previewFiles()">
                                            </label>
                                            <p class="pl-1">o arrastra y suelta</p>
                                        </div>
                                        <p class="text-xs text-gray-500">
                                            PNG, JPG, GIF .WEBP hasta 2048MB
                                        </p>
                                        <p class="text-sm font-bold">4 imagenes maximo</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </form>
                        
                        <x-input-error for="imagen.*"></x-input-error>
                        <x-input-error for="imagen"></x-input-error>

                        <section id="contenedor-imagenes-existentes" class="flex flex-wrap mt-4">
                            @foreach ($imagenesReseña as $imagen)
                                <div class="w-1/4 relative ml-4 mb-4">
                                    <img class="imagenes-existentes object-cover h-64 w-full rounded-lg" src="{{ Storage::url($imagen->url_imagen) }}" alt="{{ $imagen->id }}">
                                    <form id="form-deleteImagesReviews-{{$imagen -> id}}" method="POST" action="{{route('eliminar.imagen.reviews' , $imagen -> id )}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                class="delete-button absolute bottom-0 right-0 mb-1 mr-1 p-1 rounded-full cursor-pointer"
                                                onclick="confirmarDelete({{ $imagen->id }} , 'form-deleteImagesReviews-')">
                                            <i class="fas fa-trash text-red-600"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </section>
                        
                        {{-- ? Preview  Para las imagenes que se van a cargar en el update --}}
                        <section id="contenedor-preview" class="flex flex-wrap mt-4"></section>


                        
                            
                            

                        <div class="flex flex-row-reverse flex-wrap">
                            <button type="submit" name="btn"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                                <i class="fas fa-save mr-1 text-xl"></i>Actualizar Reseña
                            </button>
                            <a href="{{ route('overviewProduct' , $product -> id) }}"
                                class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                                <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
                            </a>
                        </div>
            
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
        var archivos = []; // Almacena todos los archivos seleccionados para nuevas imágenes
    
        function previewFiles() {
            const inputLoadArchivos = document.getElementById('file-upload');
            const archivosTemporales = Array.from(inputLoadArchivos.files);
            const imagenesExistentes = document.querySelectorAll('.imagenes-existentes').length;
            const totalPermitido = 4 - imagenesExistentes;
            
            // Combina los archivos temporales con los actuales mientras se filtran duplicados
            let nuevosArchivos = archivosTemporales.filter(nuevo => !archivos.some(actual => actual.name === nuevo.name));
            let archivosCombinados = archivos.concat(nuevosArchivos);
    
            // Verifica si el número total de imágenes supera el límite permitido
            if (archivosCombinados.length > totalPermitido) {
                window.notyf.error(`No puedes cargar más de ${totalPermitido} imágenes nuevas.`);
                // Limita los archivos al total permitido excluyendo los nuevos que excedan el límite
                archivos = archivos.slice(0, totalPermitido);
                syncInputFiles(); // Sincroniza el input con los archivos ya aceptados
                updatePreviews(); // Actualiza las vistas previas con archivos válidos
                return; // Detiene la función si se excede el límite
            }
    
            // Actualiza la lista global de archivos con los filtrados y limitados
            archivos = archivosCombinados.slice(0, totalPermitido);
            updatePreviews();
            syncInputFiles(); // Actualiza el input de tipo file con los archivos válidos
        }
    
        function updatePreviews() {
            const contenedorPreview = document.getElementById('contenedor-preview');
            contenedorPreview.innerHTML = ''; // Limpia el contenedor para rehacerlo con el estado actualizado
    
            archivos.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative w-full md:w-1/4 p-1';
    
                    const img = new Image();
                    img.src = event.target.result;
                    img.className = 'object-cover h-96 w-full rounded-lg';
    
                    const botonBorrarImg = document.createElement('button');
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                    botonBorrarImg.type = 'button';
                    botonBorrarImg.onclick = function(event) {
                        event.preventDefault(); // Evita que el botón envíe el formulario
                        archivos.splice(index, 1); // Elimina el archivo del array
                        updatePreviews(); // Actualiza las vistas previas después de eliminar
                        syncInputFiles(); // Re-sincroniza los archivos con el input después de eliminar
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
            document.getElementById('file-upload').files = dataTransfer.files; // Sincroniza los archivos con el input
        }
    
        document.querySelector('form').addEventListener('submit', function(event) {
            if (archivos.length + document.querySelectorAll('.imagenes-existentes').length > 4) {
                event.preventDefault(); // Detiene el envío del formulario
                alert('No puedes tener más de 4 imágenes en total. Por favor, ajusta las imágenes subidas.');
            }
        });
    </script>
    
    
    

    
    
    
    
    
    
    
    
    
    
        
    
    
    
    
    

        
        
        
        
    



    {{-- ? Para arrastrar las imagenes --}}

    <script>
        var archivos = []; // Almacena todos los archivos seleccionados para nuevas imágenes
        const areaArrastre = document.querySelector('.border-dashed');
        const contenedorPreview = document.getElementById('contenedor-preview'); // El contenedor para las vistas previas
    
        // Configura el evento 'dragover' para preparar el área de arrastre
        areaArrastre.addEventListener('dragover', (evento) => {
            evento.preventDefault();  // Evita el comportamiento predeterminado
            evento.currentTarget.style.borderColor = '#a866ee'; // Cambia el color del borde a morado
        });
    
        // Maneja el evento 'drop' para procesar los archivos arrastrados
        areaArrastre.addEventListener('drop', (evento) => {
            evento.preventDefault();  // Evita el comportamiento predeterminado
            evento.currentTarget.style.borderColor = '#c69cf4'; // Restablece el color del borde
            procesarArchivos(evento.dataTransfer.files); // Procesa los archivos arrastrados
        });
    
        // Restablece el color del borde cuando el archivo sale del área de arrastre
        areaArrastre.addEventListener('dragleave', (evento) => {
            evento.currentTarget.style.borderColor = '#c69cf4'; // Restablece el color del borde
        });
    
        // Procesa los archivos arrastrados
        function procesarArchivos(archivosArrastrados) {
            const imagenesExistentes = document.querySelectorAll('.imagenes-existentes').length;
            const totalPermitido = 4 - imagenesExistentes;
            const nuevosArchivos = Array.from(archivosArrastrados).filter(archivo => !archivos.some(a => a.name === archivo.name && a.size === archivo.size));
    
            if (nuevosArchivos.length + archivos.length > totalPermitido) {
                window.notyf.error(`No puedes subir más de ${totalPermitido} imágenes nuevas.`);
                return; // Detiene la función si se excede el límite
            }
    
            archivos = archivos.concat(nuevosArchivos); // Actualiza la lista global de archivos
            actualizarInputFile(); // Actualiza el input de tipo file
            mostrarVistasPrevia(); // Muestra las vistas previas
        }
    
        // Muestra las vistas previas de los archivos
        function mostrarVistasPrevia() {
            contenedorPreview.innerHTML = ''; // Limpia el contenedor de vistas previas
            archivos.forEach((archivo, index) => {
                const reader = new FileReader();
                reader.onload = (event) => {
                    const imgDiv = document.createElement('div');
                    imgDiv.className = 'relative w-full md:w-1/4 p-1';
    
                    const img = new Image();
                    img.src = event.target.result;
                    img.className = 'object-cover h-96 w-full rounded-lg';
    
                    const botonBorrarImg = document.createElement('button');
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                    botonBorrarImg.onclick = () => {
                        event.preventDefault();
                        archivos.splice(index, 1); // Elimina el archivo del array
                        mostrarVistasPrevia(); // Actualiza las vistas previas después de eliminar
                        actualizarInputFile(); // Re-sincroniza los archivos con el input después de eliminar
                    };
    
                    imgDiv.appendChild(img);
                    imgDiv.appendChild(botonBorrarImg);
                    contenedorPreview.appendChild(imgDiv);
                };
                reader.readAsDataURL(archivo);
            });
        }
    
        // Actualiza el input de tipo file
        function actualizarInputFile() {
            const dataTransfer = new DataTransfer();
            archivos.forEach(archivo => dataTransfer.items.add(archivo));
            document.getElementById('file-upload').files = dataTransfer.files;
        }
    </script>
    
    
    
    




    {{-- ! para los videos --}}
    {{-- <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
      <script defer src="https://unpkg.com/video.js/dist/video.js"></script>      --}}

</x-app-layout>
