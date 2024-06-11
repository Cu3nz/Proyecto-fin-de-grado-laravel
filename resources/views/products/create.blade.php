<x-app-layout>

    {{-- ! NUEVO CREATE DONDE PUEDO ARRASTRAR O HACER CLICK PARA SUBIR IMAGENES!!!! --}}

    {{-- ? Miga de pan 10 --}}
    {{ Breadcrumbs::render('products.create') }}

    <div class="max-w-4xl mt-5 mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del producto" value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="nombre"></x-input-error>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea type="text" placeholder="Escribe una descripción del producto" id="descripcion" name="descripcion" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
                <x-input-error for="descripcion"></x-input-error>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="mt-2">
                    <input type="checkbox" id="estado" name="estado" value="disponible"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" {{ old('estado') == 'disponible' ? 'checked' : '' }}>
                    <label for="estado" class="ml-2 text-sm text-gray-700">Disponible</label>
                    <x-input-error for="estado"></x-input-error>
                </div>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="precio"></x-input-error>
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="stock"></x-input-error>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" class="w-full" id="category_id">
                    <option value="">--------- Seleccione una categoría -------------</option>
                    @foreach ($categoriasPadres as $categoriaPadre)
                        {{-- ? Categorias padres --}}
                        <optgroup label="{{ $categoriaPadre->nombre }}">
                            @foreach ($categoriaPadre->subcategorias as $subcategoria)
                                {{-- * Subcategorias de las categorias padres --}}
                                <option value="{{ $subcategoria->id }}" @selected(old('category_id') == $subcategoria->id)>
                                    {{-- todo para dejar la categoria seleccionada tambien se puede hacer asi {{ old('category_id') == $subcategoria->id ? 'selected' : '' }} --}}
                                    {{ $subcategoria->nombre }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-input-error for="category_id"></x-input-error>
            </div>

            <div class="py-2">
                <label for="">Descripcion de imagenes</label>
                <textarea name="descripcion_imagenes" id="descripcion_imagenes" placeholder="Escribe una descripcion para todas la/las foto/s"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes') }}</textarea>
                <x-input-error for="descripcion_imagenes"></x-input-error>
            </div>

            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700">Imágenes</label>
                <div class="flex flex-col">
                    <label class="block">
                        <span class="sr-only">Añadir una foto o video</span>
                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <lord-icon
                                src="https://cdn.lordicon.com/zrkkrrpl.json"
                                trigger="hover"
                                state="hover-swirl"
                                colors="primary:#c23373,secondary:#242424"
                                style="width:110px;height:150px">
                            </lord-icon>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text_rosa  focus-within:outline-none">
                                    <span>Subir un archivo</span>
                                    {{-- ! Creamos un array para almacenar todas las imágenes que sube el usuario --}}
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

                <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto">
                    <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                        class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                </div>

                <div id="imagenPreview" class="flex flex-wrap mt-4">
                    {{-- ! Aquí se muestran las imágenes que suba el usuario --}}
                </div>
                  <x-input-error for="imagen.*"></x-input-error>
                <x-input-error for="imagen"></x-input-error>
                <input type="hidden" id="ordenImagenes" name="ordenImagenes" value="">
            </div>

            <div class="flex flex-row-reverse flex-wrap">
                <button type="submit" name="btn"
                    class="text-white rosa focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center  mb-2 sm:mb-0">
                    <i class="fas fa-plus mr-1 text-xl"></i>Crear Producto
                </button>
                
                <a href="{{ route('products.principal') }}"
                    class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                    <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
                </a>
            </div>
        </form>
    </div>

    {{-- * Script para manejar la carga de imágenes --}}
    <script>
        var archivos = []; // Importante utilizar var, para que funcione tanto el drop como el boton de file
    
        function previewFiles() {
            const inputLoadArchivos = document.getElementById('file-upload'); //? Definimos el input de tipo file
            const nuevosArchivos = Array.from(inputLoadArchivos.files); //? Convertimos los archivos a un array
            const totalPermitido = 4 - archivos.length; //? Calcula cuantas imagenes nuevas aun pueden ser cargadas

            // Si el total de los archivos actuales y los nuevos supera el limite, muestra un mensaje y sincroniza de nuevo los archivos
            if (nuevosArchivos.length > totalPermitido) {
                if (totalPermitido === 0) {
                    window.toastr.error('Ya has cargado el máximo de 4 imágenes permitidas.' , 'Imágenes excedidas.');
                } else {
                    window.toastr.error(`No puedes cargar más de ${totalPermitido} imagen${totalPermitido > 1 ? 'es' : ''} nueva${totalPermitido > 1 ? 's' : ''}.` , 'Error al cargar las imágenes.');
                }
                //? Mantiene los archivos cargados en el input
                syncInputFiles();
                return; //? Detiene la funcion si se supera el limite
            }

            
            //? Añado los nuevos archivos al array de archivos si no supera el limite.
            archivos = archivos.concat(nuevosArchivos.slice(0, totalPermitido));
            updatePreviews(); //? Actualiza las vistas previas de las imagenes
            syncInputFiles();  //? Actualiza el input de tipo file con los archivos que son validos
        }

        function updatePreviews() {
            const contenedorPreview = document.getElementById('imagenPreview'); //? Selecciono el contenedor donde se van a ver la preview de imagenes
            contenedorPreview.innerHTML = ''; //? Limpio el contenedor para rehacerlo con el estado actualizado


            archivos.forEach((file, index) => { //? Recorro el array de archivos
                const reader = new FileReader(); //? Creo un nuevo objeto FileReader

                reader.onload = (event) => { //? Esta funcion o evento se ejecuta cuando el archivo se ha cargado
                    const imgDiv = document.createElement('div'); //? Creamos un div
                    imgDiv.className = 'relative w-full md:w-1/3 p-1'; //? Le damos estilos al div

                    const descripcionImagenes = document.getElementById('descripcion_imagenes').value; //? Obtenemos la descripcion de las imagenes

                    const img = new Image(); //? creo un objeto o elemento de tipo imagen
                    img.src = event.target.result; //? Defino que el atributo src de la imagen sea el resultado de la carga del archivo
                    img.className = 'object-cover w-full h-48 md:h-64 rounded-lg'; //? Le doy unos estilos a la imagen
                    img.alt = descripcionImagenes; //? Defino el atributo alt de la imagen

                    //todo Boton de borrar
                    const botonBorrarImg = document.createElement('button'); //? Creo el boton
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>'; //? Le defino el icono de la papelera
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer'; //? Le doy unos estilos al boton
                    botonBorrarImg.type = 'button'; //? Defino el boton, el cual es de tipo button.

                    //? Evento que se dispara cuando se hace click en el boton de borrar
                    botonBorrarImg.onclick = function(event) {
                        event.preventDefault(); //* Evita que el botón envie el formulario
                        archivos.splice(index, 1); //* Elimina el archivo del array
                        updatePreviews(); //* Actualiza las vistas previas después de eliminar
                        syncInputFiles(); //* Re-sincroniza los archivos con el input después de eliminar
                    };

                    imgDiv.appendChild(img); //? Añado el boton de borrar, junto con la imagen al contenedor
                    imgDiv.appendChild(botonBorrarImg); 
                    // Añado el div contenedor al contenedor de vistas previas
                    contenedorPreview.appendChild(imgDiv);
                };
                // Lee el archivo como una URL de datos (data URL)
                reader.readAsDataURL(file);
            });

            // Mostrar u ocultar la imagen por defecto
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');
            contenedorImagenDefecto.style.display = archivos.length === 0 ? 'block' : 'none';
        }

        function syncInputFiles() {
            //* Creo un nuevo objeto o instancia del objeto DataTransfer
            const dataTransfer = new DataTransfer();
            //? Iteraro sobre el array de archivos y añade a cada archivo a la lista de los intems DataTransfer
            archivos.forEach(file => dataTransfer.items.add(file));
            //? Reasigna la lista de archivos del input de tipo file con los archivos almacenados en el objeto DataTransfer
            document.getElementById('file-upload').files = dataTransfer.files; // Reasigna los archivos previamente aceptados al input
        }

        document.querySelector('form').addEventListener('submit', function(event) {
                // Verifica si hay más de 4 archivos en el array archivos
            if (archivos.length > 4) {
                // Previene el envío del formulario
                event.preventDefault();

                window.toastr.error('No puedes tener más de 4 imágenes en total. Por favor, ajusta las imágenes subidas.');
                // Asegura que los archivos están sincronizados con el input
                syncInputFiles(); // Asegura que los archivos estan sincronizados al enviar el formulario
            }
        });
    </script>

    {{-- ? Para arrastrar las imágenes --}}
    <script>
        // Seleccionamos el area de arrastre usando la clase del div.
        const areaArrastre = document.querySelector('.border-dashed');
        
        // Evento que se dispara cuando un archivo es arrastrado sobre el area.
        areaArrastre.addEventListener('dragover', (evento) => {
            evento.stopPropagation(); // Detiene la propagación del evento.
            evento.preventDefault();  // Evita el comportamiento por defecto del navegador.
            // Cambia el color del borde como indicación visual.
            evento.currentTarget.style.borderColor = '#c23373';
        });

        // Evento que se dispara cuando los archivos son soltados en el area.
        areaArrastre.addEventListener('drop', (evento) => {
            evento.stopPropagation(); // Detiene la propagación del evento.
            evento.preventDefault();  // Evita el comportamiento por defecto del navegador (importante hacerlo).
            // Asigna los archivos al input de archivo.
            document.getElementById('file-upload').files = evento.dataTransfer.files;
            // Llama a la función de vista previa.
            previewFiles();
        });

        // Evento que se dispara cuando un archivo deja el area de arrastre.
        areaArrastre.addEventListener('dragleave', (evento) => {
            // Restablece el color del borde al original.
            evento.currentTarget.style.borderColor = '#A1295F';
        });
    </script>
</x-app-layout>