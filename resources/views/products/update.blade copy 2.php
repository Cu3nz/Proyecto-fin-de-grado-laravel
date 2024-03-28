<x-app-layout>


    <div class="max-w-4xl mt-5  mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="nombre"></x-input-error>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="descripcion"></x-input-error>
            </div>

            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                <div class="mt-2">
                    <input type="checkbox" id="estado" name="estado" value="disponible"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <label for="estado" class="ml-2 text-sm text-gray-700">Disponible</label>
                    <x-input-error for="estado"></x-input-error>
                </div>
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="number" id="precio" name="precio" value="{{ old('precio') }}"
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
                <textarea name="descripcion_imagenes" placeholder="Escribe una descripcion para todas la/las foto/s"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes') }}</textarea>
                <x-input-error for="descripcion_imagenes"></x-input-error>

                @if ($imagenesProducto->isEmpty()) {{-- ! Si esta vacia --}}
                    <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto">
                        <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                            class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                    </div>
                @else
                    {{-- ? Si no mostramos las imagines --}}
                    <div id="imagenPreview" class="flex flex-wrap mt-4">
                        {{-- Iterar sobre las imágenes existentes --}}
                        @foreach ($imagenesProducto as $imagen)
                            <div class="relative w-full md:w-1/3 p-1" data-imagen-id="{{ $imagen->id }}">
                                <img src="{{ Storage::url($imagen->url_imagen) }}"
                                    class="object-cover h-48 w-full rounded-lg">

                                {{-- Formulario para borrar la imagen --}}
                                <form method="POST" action="{{ route('products.images.destroy', $imagen->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer">
                                        <i class="fas fa-trash text-red-600"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
                <input type="hidden" id="ordenImagenes" name="ordenImagenes" value="">
            </div>

            <div class="flex flex-row-reverse flex-wrap">
                <button type="submit" name="btn"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                    <i class="fas fa-save mr-1 text-xl"></i>Actualizar
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
            const previewContainer = document.getElementById('imagenPreview');
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');
            previewContainer.innerHTML = ''; // Limpiar vistas previas anteriores
            previews = [];
            archivosSeleccionados = []; // Limpiar la lista previa de archivos seleccionados

            // Crear una estructura que almacene el archivo y el índice original de selección
            Array.from(imagenes).forEach((archivo, index) => {
                archivosSeleccionados.push({
                    archivo,
                    index
                }); // Guardar el archivo con su índice
                const reader = new FileReader();
                reader.onload = (e) => mostrarPreview(e, archivo, index);
                reader.readAsDataURL(archivo);
            });

            contenedorImagenDefecto.style.display = imagenes.length > 0 ? 'none' : 'block';
        }

        function mostrarPreview(event, archivo, index) {
            const imgDiv = document.createElement('div');
            imgDiv.className = 'relative w-full md:w-1/3 p-1';
            imgDiv.dataset.index = index; // Guardar el índice original para mantener el orden

            const img = document.createElement('img');
            img.src = event.target.result;
            img.className = 'object-cover h-48 w-full rounded-lg';
            imgDiv.appendChild(img);

            const deleteButton = document.createElement('button');
            deleteButton.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
            deleteButton.className = 'absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
            deleteButton.onclick = () => borrarPreview(imgDiv, archivo, index);
            imgDiv.appendChild(deleteButton);

            const previewContainer = document.getElementById('imagenPreview');
            // Insertar la vista previa en el contenedor, manteniendo el orden original
            previews.splice(index, 0, imgDiv); // Insertar en el índice correcto
            previewContainer.insertBefore(imgDiv, previewContainer.children[index]);
        }

        function borrarPreview(imgDiv, archivoABorrar, indexABorrar) {
            archivosSeleccionados = archivosSeleccionados.filter((item, index) => index !== indexABorrar);
            imgDiv.remove();

            // Reordenar las vistas previas restantes según su índice original
            previews = previews.filter(preview => preview.dataset.index != indexABorrar);
            previews.forEach((preview, index) => {
                if (preview.dataset.index > indexABorrar) {
                    preview.dataset.index--;
                }
            });

            if (previews.length === 0) {
                document.getElementById('contenedorImagenDefecto').style.display = 'block';
            }

            actualizarInputFiles();
        }

        function actualizarInputFiles() {
            const dataTransfer = new DataTransfer();
            archivosSeleccionados.forEach(({
                archivo
            }) => dataTransfer.items.add(archivo));
            document.getElementById('imagen').files = dataTransfer.files;
        }
    </script>
</x-app-layout>
