<x-app-layout>
    <x-propio>
        <div class="my-5 mx-5">
            <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="flex justify-center">
                    <img class=" mr-2 object-cover object-center rounded-lg h-20"
                        src="{{ Storage::url($product ->primeraImagen->url_imagen) }}"
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
                                placeholder="Escribe tu experiencia con el producto...">{{ old('reseña') }}</textarea>
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
                                             colors="primary:#c23373,secondary:#242424"
                                             style="width:110px;height:150px">
                                         </lord-icon>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text_rosa focus-within:outline-none">
                                                

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
                        
                        
                        
                        <x-input-error for="imagen.*"></x-input-error>
                        <x-input-error for="imagen"></x-input-error>

                        <section id="contenedor-preview" class="flex flex-wrap mt-4">
                            {{-- ! <!-- Las vistas previas de los archivos se mostrarán aquí --> --}}
                        </section>


                        <div class="flex flex-row-reverse flex-wrap">
                            <button type="submit" name="btn"
                                class="text-white rosa focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center  mb-2 sm:mb-0">
                                <i class="fa-regular fa-newspaper mr-2"></i>Crear Reseña
                            </button>

                            <a href="{{ route('overviewProduct' , $product -> id) }}"
                                class="sm:mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                                <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
                            </a>
                        </div>
            </form>
        </div>
    </x-propio>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const estrellasIniciales = document.getElementById('puntuacion').value; //? Obtengo el valor de las estrellas mediante el input oculto 
            if (estrellasIniciales) { //? Si hay un valor de estrellas, se establece la valoración
                valoracionEstrellas(null, estrellasIniciales); // Establece las estrellas al cargar la página
            }
        });

        //? Función para establecer las estrellas seleccionadas que toma como parametros el elemento estrella y el rango de estrellas seleccionadas
        function valoracionEstrellas(starElement, rangoEstrellas) {
            let estrellas = document.querySelectorAll('#rating .fa-star'); //? Selecciono todas las estrellas con la clase "fa-start" 
            let inputPuntuacion = document.getElementById('puntuacion');
            
            /**
             * @param estrella.classList.remove('fas') Quita la clase "fas" que es la que rellena la estrella y añade la clase "far" que es la que la deja sin rellenar.
             */
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
        var archivos = []; //! Importante utilizar var, para que funcione tanto el drop como el boton de file
    
        function previewFiles() {
    const inputLoadArchivos = document.getElementById('file-upload'); //? seleciionamos el input de tipo file
    const nuevosArchivos = Array.from(inputLoadArchivos.files); //? Convertimos los archivos a un array
    const totalPermitido = 4 - archivos.length; // Calcula cuántas imágenes nuevas aún pueden ser cargadas

    // Si el total de los archivos actuales y los nuevos supera el límite, muestra un mensaje y sincroniza de nuevo los archivos válidos
    if (nuevosArchivos.length > totalPermitido) {
        if (totalPermitido === 0) {
            window.toastr.error('Ya has cargado el máximo de 4 imágenes permitidas.');
        } else {
            window.toastr.error(`No puedes cargar más de ${totalPermitido} imagen${totalPermitido > 1 ? 'es' : ''} nueva${totalPermitido > 1 ? 's' : ''}.`);
        }
        // Mantiene los archivos ya subidos en el input
        syncInputFiles();
        return; // Detiene la función si se excede el límite
    }

    // Añade los nuevos archivos si no superan el límite
    archivos = archivos.concat(nuevosArchivos.slice(0, totalPermitido));
    updatePreviews(); // Actualiza las vistas previas de los archivos
    syncInputFiles(); // Actualiza el input de tipo file con los archivos válidos
}


    
        function updatePreviews() {
            const contenedorPreview = document.getElementById('contenedor-preview'); //? Selecciona el contenedor de las vistas previas
            contenedorPreview.innerHTML = ''; // Limpia el contenedor para rehacerlo con el estado actualizado
    
            // Itera sobre los archivos y crea una vista previa para cada uno
            archivos.forEach((file, index) => { 
                const reader = new FileReader(); // Crea un nuevo objeto FileReader
                //
                reader.onload = (event) => {
                    const imgDiv = document.createElement('div'); //* Creamos un div para la imagen
                    imgDiv.className = 'relative w-full md:w-1/4 p-1'; //* Le damos estilos
    
                    const img = new Image(); //? Creamos una nueva instancia de la clase Image
                    img.src = event.target.result; //? Al src de la imaagen le asignamos el archivo como resultado del evento de carga de la imagen
                    img.className = 'object-cover h-96 w-full rounded-lg'; //? Le damos estilos a la imagen
    
                    const botonBorrarImg = document.createElement('button'); //? Creamos un boton para borrar la imagen
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                    botonBorrarImg.type = 'button';
                    botonBorrarImg.onclick = function(event) {
                        event.preventDefault(); // Evita que el botón envíe el formulario
                        archivos.splice(index, 1); // Elimina el archivo del array
                        updatePreviews(); // Actualiza las vistas previas después de eliminar
                        syncInputFiles(); // Re-sincroniza los archivos con el input después de eliminar
                    };
    
                    imgDiv.appendChild(img); //? Añadimos la imagen al div
                    imgDiv.appendChild(botonBorrarImg); //? Añadimos el boton de borrar  al div
                    contenedorPreview.appendChild(imgDiv); //? Añadimos el div al contenedor de las vistas previas
                };
                reader.readAsDataURL(file); //? Lee el contenido del archivo como una URL
            });
        }
    
        
            function syncInputFiles() {
            const dataTransfer = new DataTransfer(); //? Crea un nuevo objeto DataTransfer que sirve para manipular archivos
            archivos.forEach(file => dataTransfer.items.add(file)); //Recorro y añado los archivos al objeto DataTransfer
            document.getElementById('file-upload').files = dataTransfer.files; // Reasigna los archivos previamente aceptados al input de tipo file para que se envíen con el formulario
        }
    
        document.querySelector('form').addEventListener('submit', function(event) {
            if (archivos.length > 4) {
                event.preventDefault();
                window.toastr.error('No puedes tener más de 4 imágenes en total. Por favor, ajusta las imágenes subidas.');
                syncInputFiles(); // Asegura que los archivos están sincronizados al enviar el formulario
            }
        });
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
            evento.currentTarget.style.borderColor = '#c23373';
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
            evento.currentTarget.style.borderColor = '#A1295F';
        });
    </script>
    




    {{-- ! para los videos --}}
    {{-- <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
      <script defer src="https://unpkg.com/video.js/dist/video.js"></script>      --}}

</x-app-layout>
