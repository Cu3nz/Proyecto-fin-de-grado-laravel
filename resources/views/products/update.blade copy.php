<x-app-layout>
    <div class="max-w-4xl mt-5  mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $product->nombre) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <x-input-error for="nombre"></x-input-error>
            </div>

            <div>
                <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" id="descripcion" name="descripcion"
                    value="{{ old('descripcion', $product->descripcion) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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
                <input type="number" id="precio" name="precio" value="{{ old('precio', $product->precio) }}"
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
                        {{-- ? Categorias padres --}}
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

            <div class="mb-6">
                <label for="imagen" class="block mb-2 text-sm font-medium text-gray-700">Imágenes</label>
                {{-- ! Creamos un array para alamacenar todas las imagenes que sube el usuario --}}
                <input type="file" id="imagen" name="imagen[]" accept="image/*" multiple
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    onchange="handleFiles(this.files)">
                <textarea name="descripcion_imagenes" placeholder="Escribe una descripción para todas las fotos"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes', $product->images->first()->desc_imagen ?? '') }}</textarea>

                <x-input-error for="descripcion_imagenes"></x-input-error>

                {{-- Imágenes y botones de borrado --}}
               <!--  @if ($imagenesProducto->isEmpty())
                    <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto" style="display: block;">
                        <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                            class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                    </div>
                @else
                    <div id="imagenPreview" class="flex flex-wrap mt-4">
                        {{-- Aquí se muestran las imágenes cargadas --}}
                        @foreach ($imagenesProducto as $imagen)
                        <div class="img-wrapper">
                            <img src="{{ Storage::url($imagen->url_imagen) }}" alt="{{ $imagen->desc_imagen }}">
                            <form action="{{ route('products.images.destroy', $imagen->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="delete-button" onclick="return confirm('¿Estás seguro de querer eliminar esta imagen?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    @endforeach
                    </div>
                </div>
                @endif -->
                
                {{-- Imágenes y botones de borrado --}}
                @if ($imagenesProducto->isEmpty())
                    <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto" style="display: block;">
                        <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                            class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                    </div>
                @else
                <div id="imagenPreview" class="flex flex-wrap mt-4">
                    {{-- Aquí se muestran las imágenes cargadas --}}
                    @foreach ($imagenesProducto as $imagen)
                        <div class="img-wrapper relative w-full md:w-1/3 p-1">
                            <img src="{{ Storage::url($imagen->url_imagen) }}" alt="{{ $imagen->desc_imagen }}"
                                class="object-cover h-48 w-full rounded-lg">
                            <button type="button"
                                    class="delete-button absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer"
                                    onclick="borrarImagen({{ $imagen->id }})">
                                <i class="fas fa-trash text-red-600"></i>
                            </button>
            
                            <form id="delete-image-form-{{ $imagen->id }}"
                                  action="{{ route('products.images.destroy', $imagen->id) }}" method="POST"
                                  style="display: none;">
                                @csrf
                                @method('DELETE') {{-- Agrega esto si tu ruta espera una petición DELETE --}}
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
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



    {{--  <script>

        document.addEventListener('DOMContentLoaded', () => {
            inicializarPreviewsExistentes();
        });
    
        let previews = [];
    
        function inicializarPreviewsExistentes() {
            // Selecciona todas las imágenes que ya están en el DOM
            const imagenesExistentes = document.querySelectorAll('.imagen-existente');
            imagenesExistentes.forEach((imgDiv, index) => {
                // Suponiendo que tus divs tienen un botón de borrado con la clase .delete-button y un atributo data-id
                const deleteButton = imgDiv.querySelector('.delete-button');
                deleteButton.addEventListener('click', () => {
                    borrarPreviewExistente(imgDiv, imgDiv.dataset.id);
                });
                previews.push(imgDiv); // Guarda las referencias a los divs de imagen para un manejo más fácil
            });
        }
    
        function handleFiles(imagenes) {
            const previewContainer = document.getElementById('imagenPreview');
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');
            previewContainer.innerHTML = ''; // Limpiar vistas previas anteriores
            previews = [];
            archivosSeleccionados = []; // Limpiar la lista previa de archivos seleccionados
    
            // Crear una estructura que almacene el archivo y el índice original de selección
            Array.from(imagenes).forEach((archivo, index) => {
                archivosSeleccionados.push({ archivo, index }); // Guardar el archivo con su índice
                const reader = new FileReader();
                reader.onload = (e) => mostrarPreview(e, archivo, index);
                reader.readAsDataURL(archivo);
            });
    
            contenedorImagenDefecto.style.display = imagenes.length > 0 ? 'none' : 'block';
        }
    
        function borrarPreviewExistente(imgDiv, imageId) {
            fetch(`/ruta-para-borrar-imagen/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    imgDiv.remove();
                    previews = previews.filter(preview => preview !== imgDiv);
                    mostrarContenedorPorDefectoSiEsNecesario();
                } else {
                    console.error('Error al eliminar la imagen:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    
        function mostrarContenedorPorDefectoSiEsNecesario() {
            const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');
            if (previews.length === 0) {
                contenedorImagenDefecto.style.display = 'block';
            }
        }
    </script> --}}

    {{-- * Funcionando a la perfeccion --}}

















</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        window.borrarImagen = function(id) {
            console.log('ID de la imagen: ' + id); // Imprime el ID en la consola
            var form = document.getElementById('delete-image-form-' + id);
            if (form) {
                form.submit();
            } else {
                console.error('El formulario con el ID delete-image-form-' + id + ' no fue encontrado.');
                alert('El formulario con el ID delete-image-form-' + id + ' no fue encontrado.');
            }
        };
    });
</script>
