<x-app-layout>

    <style>
        textarea{
            resize: none;
            field-sizing: content;
        }
    </style>

{{-- ? Migan de pan 10 --}}
{{ Breadcrumbs::render('products.create') }}

    <div class="max-w-4xl mt-5  mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
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
                <input type="number" id="precio"   name="precio" step="0.01" value="{{ old('precio') }}"
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

            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700">Imágenes</label>
                {{-- ! Creamos un array para alamacenar todas las imagenes que sube el usuario --}}
                <input type="file" id="imagen" name="imagen[]" accept="image/*" multiple
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    onchange="handleFiles(this.files)">
               
                    <div class="py-2">
                        <textarea name="descripcion_imagenes" placeholder="Escribe una descripcion para todas la/las foto/s"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes') }}</textarea>
                    <x-input-error for="descripcion_imagenes"></x-input-error>
                    </div>


                <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto">
                    <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                        class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                </div>

                <div id="imagenPreview" class="flex flex-wrap mt-4">
                    {{-- ! Aqui se muestran las imagenes que suba el usuario --}}
                </div>
                <x-input-error for="imagen"></x-input-error>
                <input type="hidden" id="ordenImagenes" name="ordenImagenes" value="">
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



    {{-- * Funcionando a la perfeccion --}}

    <script>
        let previews = [];
        let archivosSeleccionados = [];
        
        function handleFiles(imagenes) {
            const previewContainer = document.getElementById('imagenPreview'); //? Definimos una constante para el div donde se van a ver las imagenes preview
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto'); //? Definimos una constante para el div donde se va a ver la imagen por defecto
            previewContainer.innerHTML = ''; // Limpiar vistas previas anteriores
            previews = [];
            archivosSeleccionados = []; // Limpiar la lista previa de archivos seleccionados
    
            //? Convierto las imagenes en un array para poder interar por ellas con un foreach
            Array.from(imagenes).forEach((archivo, index) => {
                archivosSeleccionados.push({ archivo, index }); //? Añado cada imagen al array archivosSeleccionados jusnto con su indice original
                const reader = new FileReader(); //? Creo una instancia de FileReader, herramienta que permite leer los contenidos de archivos almacenados en el cliente de forma asincrona
                reader.onload = (e) => mostrarPreview(e, archivo, index);
                reader.readAsDataURL(archivo); //? Leemos el contenido de la imagen para mostrarlo en la vista previa
            });
    
            contenedorImagenDefecto.style.display = imagenes.length > 0 ? 'none' : 'block'; //? Si hay imagenes el contenedor con la imagen por defecto se elimina, de lo contrario se muestra.
        }
    
        function mostrarPreview(event, archivo, index) {
            const imgDiv = document.createElement('div'); //? Creamos un div
            imgDiv.className = 'relative w-full md:w-1/3 p-1'; //? Le damos clases al div 
            imgDiv.dataset.index = index; // Guardar el índice original para mantener el "orden"
    
            const img = document.createElement('img'); //? Creamos un elemento img
            img.src = event.target.result; //? Cargamos la imagen leida por el FileReader en el elemento img
            img.className = 'object-cover h-48 w-full rounded-lg'; //? Le damos clase 
            imgDiv.appendChild(img); //? Añadimos la imagen al div creado anteriormente
    
            const deleteButton = document.createElement('button'); //? Creamos un boton para borrar la imagen
            deleteButton.innerHTML = '<i class="fas fa-trash text-red-600"></i>'; //? Le ponemos la papelera como icono
            deleteButton.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer'; //? Le damos clases css al boton
            deleteButton.onclick = () => borrarPreview(imgDiv, archivo, index); //? Evento para borrar la imagen
            imgDiv.appendChild(deleteButton); //? Añadimos el boton al div
    
            const previewContainer = document.getElementById('imagenPreview');
            // Insertar la vista previa en el contenedor, manteniendo el orden original
            previews.splice(index, 0, imgDiv); // Insertar en el índice correcto
            previewContainer.insertBefore(imgDiv, previewContainer.children[index]);
        }
    
        function borrarPreview(imgDiv, archivoABorrar, indexABorrar) {
    // Actualiza la lista de archivos seleccionados removiendo el archivo que coincide con el archivo a borrar
    archivosSeleccionados = archivosSeleccionados.filter(item => item.archivo !== archivoABorrar);
    imgDiv.remove(); //? Elimino la imagen del DOM
    
    // Si no hay mas elementos en la lista de vistas previas, mostrar el contenedor por defecto
    if (archivosSeleccionados.length === 0) {
        document.getElementById('contenedorImagenDefecto').style.display = 'block';
    }
    
    actualizarInputFiles(); // Actualiza el input de archivos
}

    
        function actualizarInputFiles() {
            const dataTransfer = new DataTransfer();
            archivosSeleccionados.forEach(({ archivo }) => dataTransfer.items.add(archivo));
            document.getElementById('imagen').files = dataTransfer.files;
        }
    </script>
    
    
    












    {{-- todo Script que funciona pero no lo hace bien --}}
   {{--  <script>
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
 --}}

</x-app-layout>
