<x-app-layout>
    <div class="max-w-4xl mt-5  mx-auto p-6 bg-gray-200 rounded-lg shadow-md">
        <h1 class="text-center text-xl font-bold">Modificando el producto con ID: <span class="text-red-600">{{$product->id}}</span></h1>
        <form id="formUpdate" action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
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
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion_imagenes', $product->images->first()->desc_imagen ?? 'Imagen por defecto, sin img de productos') }}</textarea>

                <x-input-error for="descripcion_imagenes"></x-input-error>

                {{-- Aqui verificamos que $iamgenesProducto NO este vacia y que exista el primerProducto de la variable $imagenesProducto --}}
                @if ($imagenesProducto->isNotEmpty() && isset($imagenesProducto[0]))
                    <div style="display: none" class="img-wrapper relative w-full md:w-1/3 p-1">
                        <img src="{{ Storage::url($imagenesProducto[0]->url_imagen) }}"
                            alt="{{ $imagenesProducto[0]->desc_imagen }}"  class="object-cover h-48 w-full rounded-lg">
                        <button type="button"
                            class="delete-button absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer"
                            onclick="borrarImagen({{ $imagenesProducto[0]->id }})">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>

                        <form id="delete-image-form-{{ $imagenesProducto[0]->id }}"
                            action="{{ route('products.images.destroy', $imagenesProducto[0]->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endif

                {{-- Imágenes y botones de borrado --}}
                @if ($imagenesProducto->isEmpty())
                    <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto">
                        <img src="{{ Storage::url('noimage.png') }}" alt="Imagen por defecto"
                            class="h-72 mx-auto rounded w-full object-cover border-4 border-gray-300">
                    </div>
                @endif


                {{--  Lo que hace el style, si $imagenProducto esta vacio no contiene ninguna imagen, definimos este div como oculto, de lo contrario si tiene imagenes, asignamos una cadena vacia para mostrar las imagenes --}}
                <div id="imagenPreview"  class="flex flex-wrap mt-4"
                    style="{{ $imagenesProducto->isEmpty() ? 'display: none;' : '' }}">
                    {{-- Aquí se muestran las imágenes cargadas --}}
                    @foreach ($imagenesProducto as $imagen)
                        {{-- @dd($imagen) --}}
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
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex flex-row-reverse flex-wrap">
                <button type="submit" name="btn"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xl w-full sm:w-auto px-4 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-2 sm:mb-0">
                    <i class="fas fa-save mr-1 text-xl"></i>Actualizar
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
        document.addEventListener('DOMContentLoaded', (event) => {
            let previews = [];
            let archivosSeleccionados = [];
            let imagenesParaBorrar = [];

            // Función para manejar la selección de nuevas imágenes
            window.handleFiles = function(imagenes) {
                const previewContainer = document.getElementById('imagenPreview');
                const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');

                Array.from(imagenes).forEach((archivo, index) => {
                    const reader = new FileReader();
                    reader.onload = (e) => mostrarNuevaImagen(e, archivo, index);
                    reader.readAsDataURL(archivo);
                });

                contenedorImagenDefecto.style.display = 'none';
            };

            // Función para mostrar una nueva imagen
            function mostrarNuevaImagen(event, archivo, index) {
                const imgDiv = document.createElement('div');
                imgDiv.className = 'img-wrapper relative w-full md:w-1/3 p-1';

                const img = document.createElement('img');
                img.src = event.target.result;
                img.className = 'object-cover h-48 w-full rounded-lg';
                imgDiv.appendChild(img);

                const deleteButton = document.createElement('button');
                deleteButton.innerHTML = '<i class="fas fa-trash text-red-600"></i>';
                deleteButton.className =
                    'delete-button absolute bottom-0 right-0 m-1 p-1 rounded-full cursor-pointer';
                deleteButton.onclick = () => borrarNuevaImagen(imgDiv, archivo);
                imgDiv.appendChild(deleteButton);

                previews.push(imgDiv);
                archivosSeleccionados.push(archivo);
                actualizarInputFiles();

                const previewContainer = document.getElementById('imagenPreview');
                if (previewContainer) {
                    previewContainer.style.display = 'flex'; // Aseguramos que el contenedor esté visible
                    previewContainer.appendChild(imgDiv); // Añadimos la nueva imagen al contenedor
                } else {
                    console.error('El contenedor de vista previa de la imagen no se encuentra.');
                }
            }

            // Función para borrar una nueva imagen que se suba mediante el input de tipo file
            function borrarNuevaImagen(imgDiv, archivo) {
                const index = archivosSeleccionados.indexOf(archivo);
                if (index !== -1) {
                    archivosSeleccionados.splice(index, 1);
                    actualizarInputFiles();
                }
                imgDiv.remove();
                previews = previews.filter(preview => preview !== imgDiv);
                /* mostrarContenedorPorDefectoSiEsNecesario(); */
            }

            // Función para mostrar el contenedor por defecto si no hay imágenes seleccionadas
            /* function mostrarContenedorPorDefectoSiEsNecesario() {
                const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto');
                if (previews.length === 0) {
                    contenedorImagenDefecto.style.display = 'block';
                }
            } */

            // Función para enviar el formulario
            /*  window.enviarFormulario = function() {
                 const form = document.getElementById('formUpdate');
                 // Agregar campos ocultos para las imágenes a borrar
                 imagenesParaBorrar.forEach(id => {
                     const input = document.createElement('input');
                     input.type = 'hidden';
                     input.name = 'imagenes_para_borrar[]';
                     input.value = id;
                     form.appendChild(input);
                 });

                 // Envío del formulario
                 form.submit();
             }; */

            /* // Función para eliminar una imagen existente
            window.borrarImagen = function(id) {
                // Crear un input oculto para indicar la imagen a borrar
                var inputParaBorrar = document.createElement("input");
                inputParaBorrar.type = "hidden";
                inputParaBorrar.name = "imagenes_para_borrar[]";
                inputParaBorrar.value = id;

                // Añadir este input al formulario
                var form = document.getElementById("formUpdate");
                form.appendChild(inputParaBorrar);

                // Opcionalmente, eliminar la visualización de la imagen del DOM
                document.querySelector(`#img-wrapper-${id}`).remove();
            }; */

            // Función para actualizar el input de tipo file con las imágenes seleccionadas
            function actualizarInputFiles() {
                const dataTransfer = new DataTransfer();
                archivosSeleccionados.forEach(archivo => dataTransfer.items.add(archivo));
                document.getElementById('imagen').files = dataTransfer.files;
            }
        });
    </script>

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

{{-- todo Sergio --}}
