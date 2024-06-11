<x-app-layout>
    {{--! UPDATE FUNCIONANDO PUEDO ELIMINAR, ARRASTRAR LAS IMAGENES Y CARGAR LAS IMAGENES DESDE EL INPUT FILE ELIGIENDO LAS IMAAGENES 31 MAYO --}}
    {{-- ? Miga de pan 11 --}}
    {{ Breadcrumbs::render('products.update', $product) }}
    <div class="max-w-4xl mt-5 mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        {{-- <h1 class="text-center text-xl font-bold">Modificando el producto con ID: <span class="text-red-600">{{$product->id}}</span></h1>
        <h1 class="text-center text-xl font-bold">
            Creado por el usuario: <span class="text-green-600">{{ $product->user->name ?? 'Sin user' }}</span>
        </h1> --}}
        <form id="formUpdate" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $product->nombre) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="nombre"></x-input-error>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea type="text" id="descripcion" name="descripcion"
                    
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion', $product->descripcion) }}</textarea>
                <x-input-error for="descripcion"></x-input-error>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="mt-2">
                    <input type="checkbox" id="estado" @checked(old('estado', $product->estado == 'DISPONIBLE')) name="estado" value="disponible"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <label for="estado" class="ml-2 text-sm text-gray-700">Disponible</label>
                    <x-input-error for="estado"></x-input-error>
                </div>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" step="0.01" value="{{ old('precio', $product->precio) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="precio"></x-input-error>
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="stock"></x-input-error>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="category_id" class="w-full" id="category_id">
                    <option value="">--------- Seleccione una categoría -------------</option>
                    @foreach ($categoriasPadres as $categoriaPadre)
                    {{-- ? Categoria Padre --}}
                        <optgroup label="{{ $categoriaPadre->nombre }}">
                            @foreach ($categoriaPadre->subcategorias as $subcategoria)
                            {{-- * Subcategorias de las categorias padres --}}
                                <option value="{{ $subcategoria->id }}"
                                    {{ old('category_id', $product->category_id == $subcategoria->id ? 'selected' : '') ? 'selected' : '' }}>
                                    {{-- todo para dejar la categoria seleccionada tambien se puede hacer asi {{ old('category_id') == $subcategoria->id ? 'selected' : '' }} --}}
                                    {{ $subcategoria->nombre }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <x-input-error for="category_id"></x-input-error>
            </div>
            
            <label for="descripcion_imagenes">Descripcion de las imagenes</label>
            <textarea name="descripcion_imagenes" id="descripcion_imagenes" placeholder="Escribe una descripción para todas las fotos"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes', $product->images->first()->desc_imagen ?? 'Imagen por defecto, sin img de productos') }}</textarea>

            <x-input-error for="descripcion_imagenes"></x-input-error>


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
        </form>

        <x-input-error for="imagen.*"></x-input-error>
        <x-input-error for="imagen"></x-input-error>

         {{-- <section id="contenedor-imagenes-existentes" class="flex w-full flex-wrap mt-4">
            @foreach ($imagenesProducto as $imagen)
                <div class="relative w-full md:w-1/3 p-1">
                    <img class="imagenes-existentes object-cover h-48 md:h-64 w-full rounded-lg" src="{{ Storage::url($imagen->url_imagen) }}" alt="{{ $imagen->desc_imagen }}">
                    <form id="form-deleteImagesUpdate-{{$imagen->id}}" method="POST" action="{{ route('products.images.destroy', $imagen->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                                class="delete-button absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer"
                                onclick="confirmarDelete({{ $imagen->id }}, 'form-deleteImagesUpdate-')">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </section> --}}
        {{-- 
                * btn-delete-img-div es un componente de Livewire que se encarga de eliminar las imagenes.
                * 
                * @param imageable_id - El ID del producto en este caso al que pertenecen las imagenes. 
                *                       En este caso, es el ID del producto.
                *                       Este ID se utiliza para buscar y cargar las imagenes asociadas en la tabla "images" mediante la siguiente consulta.

                ? Esta consulta lo que hace es buscar todas las imagenes asociadas al producto, si el id del producto es 50 y su imageable_type es App/Models/Products.
                ? Esta consulta lo que hace es posicionarse en la tabla images y buscar todos los registros donde el imageable_id = 50 y el imageable_type sea App\Models\Product
                $this->imagenesProducto = Image::where('imageable_id', $this->imageable_id)
                ->where('imageable_type', $this->imageable_type)
                ->get();
                 
                todo @param imageable_type - El tipo de modelo al que pertenecen las imágenes.
                todo                         Define el modelo al que pertenece la imagen, en este caso será 'App\Models\Product'.
                todo                         Esto se puede verificar en la tabla "images" donde el atributo "imageable_type" define el tipo de modelo.
                 
                ? El componente btn-delete-img-div realiza las siguientes tareas:
                ? 1. Recibe el ID y el tipo de modelo del producto o reseña.
                ? 2. Carga todas las imágenes asociadas con el producto o reseña utilizando el método "loadImages".
                ? 3. Muestra cada imagen con un botón para eliminarla.
                ? 4. Cuando se hace clic en el botón de eliminar, se llama al método "removeImage" con el ID de la imagen.
                ? 5. El método "removeImage" elimina la imagen de la base de datos y del almacenamiento, y luego recarga la lista de imágenes.
                
 --}}
            @livewire('btn-delete-img-div', ['imageable_id' => $product->id, 'imageable_type' => 'App\Models\Product'])
        

        <section id="contenedor-preview" class="flex flex-wrap w-full h-full mt-4" aria-live="polite" aria-atomic="true">
            @if($product->images->isEmpty())
            <div class="w-full md:w-1/3 p-1">
                <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto" class="object-cover h-64 w-full rounded-lg">
            </div>
            
            @endif
        </section>

        <div class="flex flex-row-reverse flex-wrap">
            <button type="submit" name="btn" form="formUpdate"
                class="text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center rosa mb-2 sm:mb-0">
                <i class="fa-solid fa-rotate mr-2"></i>Actualizar
            </button>
            <a href="{{ route('products.principal') }}"
                class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
            </a>
        </div>
    </div>



    {{-- ! script para las imagenes --}}
    <script>
        var archivos = []; // Almacena todos los archivos seleccionados para nuevas imagenes
    
        function previewFiles() {
            const inputLoadArchivos = document.getElementById('file-upload'); //? almacena el input de tipo file
            const archivosTemporales = Array.from(inputLoadArchivos.files); //? Convierto los archivos seleccionados en un array
            const imagenesExistentes = document.querySelectorAll('.imagenes-existentes').length; //? Cuenta las imagenes existentes
            const totalPermitido = 4 - imagenesExistentes; //? Calcula el total de imagenes permitidas
            
            //? Filtra los archivos temporales para excluir los duplicados
            let nuevosArchivos = archivosTemporales.filter(nuevo => !archivos.some(actual => actual.name === nuevo.name));
            //? Trabajo con los archivos existentes y  con los nuevos
            let archivosCombinados = archivos.concat(nuevosArchivos);
    
            //? Verifico si el numero total de imagenes excede el limite permitido
            if (archivosCombinados.length > totalPermitido) {
                window.toastr.error(`No puedes cargar más de ${totalPermitido} imágenes nuevas.` , 'Exceso de imagenes ');
                //* Limita los archivos al total permitido excluyendo los nuevos que excedan el limite
                archivos = archivos.slice(0, totalPermitido);
                syncInputFiles(); //* Sincroniza el input con los archivos ya aceptados
                updatePreviews(); //* Actualiza las vistas previas con archivos válidos
                return; //* Detiene la función si se excede el límite
            }
    
            
            // Actualiza la lista global de archivos con los archivos combinados limitados al total permitido
            archivos = archivosCombinados.slice(0, totalPermitido);
            updatePreviews(); //? Actualiza las vistas previas con los archivos validos
            syncInputFiles(); // Actualiza el input de tipo file con los archivos validos
        }
    
        //todo Funcion que actualiza la vista previa de las imagenes
        function updatePreviews() {
            const contenedorPreview = document.getElementById('contenedor-preview'); //? Definimos el contenedor donde se muestran las previews de las imaagenes
            contenedorPreview.innerHTML = ''; // Limpia el contenedor para rehacerlo con el estado actualizado
    
            archivos.forEach((file, index) => {  //? Recorro los archivos mediante un forEach
                const reader = new FileReader(); //? Creo un objeto FileReader para leer los archivos
                //? Configuro el evento onload para mostrar las vistas previas de las imagenes
                reader.onload = (event) => { 
                    const imgDiv = document.createElement('div'); //? Creamos un div
                    imgDiv.className = 'relative w-full md:w-1/3 p-1'; //? Definimos clases para ese div

                    const descripcionImagenes = document.getElementById('descripcion_imagenes').value; //? Obtenemos la descripcion de las imagenes

                    const img = new Image(); //? Creamos un objeto de tipo imagen imagen
                    img.src = event.target.result; //? Almaceno en el atributo src la url de la imagen
                    img.className = 'object-cover h-64 w-full rounded-lg'; //? Le damos unas clases
                    img.alt = descripcionImagenes; //? Definimso en el atributo alt la descripcion de las imagenes

                    //? Creo un boton para borrar la imagen
                    const botonBorrarImg = document.createElement('button');
                    botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>'; //? Añado la papelera
                    botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer'; //? Le damos unas clases de css y lo definimos en una posicion 
                    botonBorrarImg.type = 'button'; //? Definimos el tipo de boton, que va a utilizar

                    botonBorrarImg.onclick = function(event) { //? DEFINO LA ACCION DE HACER CLICK 
                        event.preventDefault(); // Evita que el botón envíe el formulario
                        archivos.splice(index, 1); // Elimina el archivo del array
                        updatePreviews(); // Actualiza las vistas previas después de eliminar
                        syncInputFiles(); // Re-sincroniza los archivos con el input después de eliminar
                    };
                    botonBorrarImg.setAttribute('aria-label', 'Eliminar Imagen');

                    imgDiv.appendChild(img); 
                    imgDiv.appendChild(botonBorrarImg); //? añado la imagen al div.
                    contenedorPreview.appendChild(imgDiv); //? Añade el div contenedor al contenedor de vistas previas

                };
                reader.readAsDataURL(file); //? // Lee el archivo como una URL de datos
            });
        }
    
            // Función para sincronizar los archivos con el input de tipo file
        function syncInputFiles() {
            const dataTransfer = new DataTransfer(); //? Creo un nuevo objeto de tipo dataTransfer
            archivos.forEach(file => dataTransfer.items.add(file)); //?// Añade cada archivo del array archivos al objeto DataTransfer
            document.getElementById('file-upload').files = dataTransfer.files;// Sincroniza los archivos con el input de tipo file

        }

            // Añade un manejador de eventos para el envío del formulario
        document.querySelector('form').addEventListener('submit', function(event) {
            // Verifica si el número total de imágenes (nuevas y existentes) supera el límite permitido

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
            evento.currentTarget.style.borderColor = '#A1295F'; // Cambia el color del borde a morado
        });
    
        // Maneja el evento 'drop' para procesar los archivos arrastrados
        areaArrastre.addEventListener('drop', (evento) => {
            evento.preventDefault();  // Evita el comportamiento predeterminado
            evento.currentTarget.style.borderColor = '#A1295F'; // Restablece el color del borde
            procesarArchivos(evento.dataTransfer.files); // Procesa los archivos arrastrados
        });
    
        // Restablece el color del borde cuando el archivo sale del área de arrastre
        areaArrastre.addEventListener('dragleave', (evento) => {
            evento.currentTarget.style.borderColor = '#c23373'; // Restablece el color del borde
        });
    
        // Procesa los archivos arrastrados
        function procesarArchivos(archivosArrastrados) {
            const imagenesExistentes = document.querySelectorAll('.imagenes-existentes').length;
            const totalPermitido = 4 - imagenesExistentes;
            const nuevosArchivos = Array.from(archivosArrastrados).filter(archivo => !archivos.some(a => a.name === archivo.name && a.size === archivo.size));
    
            if (nuevosArchivos.length + archivos.length > totalPermitido) {
                window.toastr.error(`No puedes subir más de ${totalPermitido} imágenes nuevas.` , 'Exceso de imagenes ');
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
                imgDiv.className = 'relative w-full md:w-1/3 p-1';

                const img = new Image();
                img.src = event.target.result;
                img.className = 'object-cover h-64 w-full rounded-lg';

                const botonBorrarImg = document.createElement('button');
                botonBorrarImg.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                botonBorrarImg.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                botonBorrarImg.onclick = function(event) {
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

</x-app-layout>