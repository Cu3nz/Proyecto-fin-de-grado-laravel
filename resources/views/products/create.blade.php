<x-app-layout>
    

    <div class="max-w-4xl mt-5  mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="descripcion" name="descripcion"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="mt-2">
                    <input type="checkbox" id="estado" name="estado" value="disponible" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <label for="estado" class="ml-2 text-sm text-gray-700">Disponible</label>
                </div>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select name="categoria" class="w-full" id="categoria">
                    <option value="">--------- Seleccione una categoría -------------</option>
                    @foreach ($categoriasPadres as $categoriaPadre) {{-- ? Categorias padres --}}
                        <optgroup label="{{ $categoriaPadre->nombre }}">
                            @foreach ($categoriaPadre->subcategorias as $subcategoria) {{-- * Subcategorias de las categorias padres --}}
                                <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700">Imágenes</label>
                {{-- ! Creamos un array para alamacenar todas las imagenes que sube el usuario --}}
                <input type="file" id="imagen" name="imagen[]" accept="image/*" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onchange="handleFiles(this.files)">
                <textarea name="descripcion_imagenes" placeholder="Escribe una descripcion para todas la/las foto/s" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>

                
                <div class="w-full mt-2 px-2 md:w-1/2" id="contenedorImagenDefecto">
                    <img src="{{Storage::url('noimage.png')}}" alt="Imagen por defecto" class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                </div>
            
                <div id="imagenPreview" class="flex flex-wrap mt-4">
                    {{-- ! Aqui se muestran las imagenes que suba el usuario --}}
                </div>
            </div>

            <div class="flex flex-row-reverse flex-wrap">
                <button type="submit" name="btn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                    <i class="fas fa-save mr-1 text-xl"></i>Crear
                </button>
                <button type="reset" class="mr-2 text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                    <i class="fas fa-paintbrush mr-1 text-xl"></i>Limpiar campos
                </button>
                <a href="index.php" class="mr-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 mb-2 sm:mb-0">
                    <i class="fas fa-xmark mr-1 text-xl"></i>Cancelar
                </a>
            </div>
            
        </form>
    </div>

    {{-- * Funcionando a la perfeccion --}}
    <script>
        let previews = [];
        let archivosSeleccionados = []; // Necesitamos esta variable para mantener un registro de los archivos actualmente seleccionados

    
        function handleFiles(imagenes) {
            const previewContainer = document.getElementById('imagenPreview'); //? Contenedor de las vistas previas
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto'); //?
            previewContainer.innerHTML = ''; // Limpiar vistas previas anteriores
            previews = []; // Reiniciar la lista de archivos seleccionados al cargar nuevas imágenes
            archivosSeleccionados = Array.from(imagenes); // Actualizar con los nuevos archivos seleccionados


            if (imagenes.length > 0) { //* Si el usuario ha subido imagenes
                contenedorImagenDefecto.style.display = 'none'; //? Ocultamos el div con la imagen por defecto
            } else {
                contenedorImagenDefecto.style.display = 'block'; //? Si no, mostramos el div con la imagen por defecto
            }
    

            Array.from(imagenes).forEach((imagen, index) => {
                const reader = new FileReader(); //? Crea una instancia de FileReader, que es una herramienta que permite leer los contenidos de archivos (o buffers de datos) almacenados en el cliente de forma asíncrona.
                reader.onload = function(e) { // Define qué hacer cuando el FileReader ha terminado de cargar el archivo. 'e' es el evento de carga con la información del archivo cargado.
                    const imgDiv = document.createElement('div'); //? Creamos un div donde se van a ir mostrando las imagenes en modo preview
                    imgDiv.className = 'relative w-full md:w-1/3 p-1'; //? Le damos unos estilos al div mediante una clase, utilizo className para sobreescribir cualquier clase que tenga, en este caso no tiene ninguna pero mejor prevenir que lamentar
                    
                    const img = document.createElement('img'); //? Creamos un elemento img
                    img.src = e.target.result; //? Carga la imagen leida por el FileReader en el elemento img, estableciendo el src de la imagen leida
                    img.className = 'object-cover h-48 w-full rounded-lg'; //? Le damos unos estilos a la imagen
    
                    const deleteButton = document.createElement('button'); //? Creamos el boton de borrar
                    deleteButton.innerHTML = '<i class="fas fa-trash text-red-600"></i>'; //? Le metemos como texto un boton de una papelera con un color rojo
                    deleteButton.className = 'absolute bottom-0 right-0 m-1 p-1  rounded-full cursor-pointer'; //? Le damos estilos añadiendo una clase con tailwind
                    deleteButton.addEventListener('click', () => borrarPreview(imgDiv, imagen)); // Evento para borrar la preview y el archivo

    
                    //todo Momento de añadir los elementos al DOM
                    imgDiv.appendChild(img); //? Añadimos la imagen al div
                    imgDiv.appendChild(deleteButton); //? Añadimos el boton de borrar al div
                    previewContainer.appendChild(imgDiv);  //? Añadimos al al contenedor div donde se van a cargar todas las imagenes (contenedor Principal), los divs con cada una de las imagenes
                    previews.push(imgDiv); //? Añadimos el div con la imagen al array de vistas previas
                };
                reader.readAsDataURL(imagen);
            });
        }
    
        function borrarPreview(imgDiv, archivo) {
        // Encuentra y elimina el archivo del array de archivos seleccionados
        const indiceArchivo = archivosSeleccionados.indexOf(archivo);
        if (indiceArchivo > -1) {
            archivosSeleccionados.splice(indiceArchivo, 1);
        }

        // Encuentra y elimina la vista previa del array y del DOM
        const indicePreview = previews.indexOf(imgDiv);
        if (indicePreview > -1) {
            previews.splice(indicePreview, 1);
            imgDiv.remove();
        }

        // Si no hay más vistas previas, mostramos la imagen por defecto
        if (previews.length === 0) {
            document.getElementById('contenedorImagenDefecto').style.display = 'block';
        }

        // Actualiza el input de archivos con los archivos restantes
        const dataTransfer = new DataTransfer();
        archivosSeleccionados.forEach(file => dataTransfer.items.add(file));
        document.getElementById('imagen').files = dataTransfer.files;
    }

    </script>




 {{--  <script>
    let archivosSeleccionados = []; //? Almacena referencias a los archivos seleccionados

    function handleFiles(imagenes) {
        const previewContainer = document.getElementById('imagenPreview'); //? Contenedor de las vistas previas
        const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto'); //? Contenedor de la imagen por defecto
        previewContainer.innerHTML = ''; // Limpiar vistas previas anteriores
        archivosSeleccionados = []; // Reiniciar la lista de archivos seleccionados al cargar nuevas imágenes

        if (imagenes.length > 0) { //* Si el usuario ha subido imágenes
            contenedorImagenDefecto.style.display = 'none'; //? Ocultamos el div con la imagen por defecto
            archivosSeleccionados = Array.from(imagenes); //? Convertir FileList en Array y almacenar referencia
        } else {
            contenedorImagenDefecto.style.display = 'block'; //? Mostrar el div con la imagen por defecto si no hay imágenes
        }

        archivosSeleccionados.forEach((imagen, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgDiv = document.createElement('div'); //? Creamos un div para la vista previa de la imagen
                imgDiv.className = 'relative w-full md:w-1/3 p-1'; //? Estilos para el div de la vista previa
                
                const img = document.createElement('img'); //? Creamos un elemento img
                img.src = e.target.result; //? Establecemos el src de la imagen con el resultado de FileReader
                img.className = 'object-cover h-48 w-full rounded-lg'; //? Estilos para la imagen
                
                const deleteButton = document.createElement('button'); //? Creamos el botón de borrar
                deleteButton.innerHTML = '<i class="fas fa-trash text-red-600"></i>'; //? Icono de papelera para el botón
                deleteButton.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer'; //? Estilos para el botón de borrar
                deleteButton.addEventListener('click', () => borrarPreview(imgDiv, index)); //? Evento para borrar la vista previa
                
                //todo Añadir elementos al DOM
                imgDiv.appendChild(img); //? Añadimos la imagen al div
                imgDiv.appendChild(deleteButton); //? Añadimos el botón de borrar al div
                previewContainer.appendChild(imgDiv); //? Añadimos el div de la vista previa al contenedor principal
            };
            reader.readAsDataURL(imagen);
        });
    }

    function borrarPreview(imgDiv, index) {
        //? Eliminar la imagen seleccionada de la lista y del input de archivos
        archivosSeleccionados.splice(index, 1); //? Eliminar archivo de la lista
        imgDiv.remove(); //? Eliminar div de la imagen del DOM

        // Actualizar el input de archivos con los archivos restantes
        const dataTransfer = new DataTransfer(); //? Crear un nuevo objeto DataTransfer
        archivosSeleccionados.forEach(file => dataTransfer.items.add(file)); //? Añadir los archivos restantes
        document.getElementById('imagen').files = dataTransfer.files; //? Establecer los archivos en el input

        //? Si no quedan vistas previas, mostrar la imagen por defecto
        if (archivosSeleccionados.length === 0) {
            document.getElementById('contenedorImagenDefecto').style.display = 'block';
        }
    }
</script> --}}
    
</x-app-layout>
