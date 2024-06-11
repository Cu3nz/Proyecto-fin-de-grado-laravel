<x-app-layout>
    {{-- ? Miga de pan 4 --}}
    {{ Breadcrumbs::render('category.create') }}
    <x-propio>
        <div class="mx-4 p-6 rounded-xl shadow-xl bg-gray-400 dark:text-gray-200 sm:w-1/2 sm:mx-auto">
            <form action="{{ route('category.store') }}" method="POST" class="sm:max-w-lg sm:mx-auto"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="nombre" class="block mb-2 text-md font-bold  text-gray-900">Nombre de la
                        categoría</label>
                    <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre"
                        class="bg-gray-50 border border-gray-300 font-bold text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Nombre de la categoría">
                    <x-input-error for="nombre"></x-input-error>
                </div>

               



                <div class="mb-6">
                    <label for="tipo-categoria" class="block mb-2 text-md font-bold  text-gray-900">Tipo de
                        categoría</label>
                    <select name="tipo" id="tipo-categoria" onchange="mostrarSelectPadres(this.value)"
                        class="bg-gray-50 border border-gray-300 font-bold text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">---- Selecciona una opción --------</option>
                        <option value="padre" @if (old('tipo') == 'padre') selected @endif>Categoría Padre
                        </option>
                        <option value="hijo" @if (old('tipo') == 'hijo') selected @endif>Subcategoría</option>
                    </select>
                    <x-input-error for="tipo"></x-input-error>
                </div>




                <div class="mb-6" id="padre-select-container" style="display: none;">
                    <label for="select-padres" class="block mb-2 text-md font-bold text-gray-900">Categoría
                        Padre</label>
                    <select name="category_padre_id" id="select-padres"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-md font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">---- Selecciona una opción --------</option>
                        @foreach ($categoriasPadres as $categoriaPadre)
                            <option value="{{ $categoriaPadre->id }}"
                                {{ old('category_padre_id') == $categoriaPadre->id ? 'selected' : '' }}>
                                {{ $categoriaPadre->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category_padre_id"></x-input-error>
                </div>

                <label for="descripcion" class="block mb-2 text-md font-bold text-gray-900">Descripción para la categoria</label>
                <textarea name="descripcion" id="descripcion" placeholder="Escribe una descripción para la categoria"
                class="mt-1 block w-full mb-5 text-black font-bold rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descripcion') }}</textarea>
                <x-input-error for="descripcion"></x-input-error>


                {{-- todo Imagen --}}
                <div class="mb-6">
                    <label for="imagen" class="block my-2 text-md font-bold text-gray-900">Imágenes</label>
                    {{-- ! Creamos un array para alamacenar todas las imagenes que sube el usuario --}}
                    <input type="file" id="imagen" name="imagen" accept="image/*"
                        onchange="handleFiles(this.files)"
                        class="bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />

                    <label for="desc_imagen" class="text-gray-900 mt-5 text-md font-bold">Descripción imagen</label>
                    <textarea name="desc_imagen" id="desc_imagen" placeholder="Escribe una descripción para todas la/las foto/s"
                    class="mt-1 block w-full mb-5  text-black font-bold rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('desc_imagen') }}</textarea>
                    <x-input-error for="desc_imagen"></x-input-error>


                    <div class="w-full mt-2 px-2 md:w-3/8" id="contenedorImagenDefecto">
                        <img src="{{ Storage::url('noimage.png') }}"
                            class="w-full h-auto md:h-72 rounded object-cover border-4 border-black" id="img">
                    </div>

                    <div id="imagenPreview" class="flex mt-4">
                        {{-- ! Aqui se muestran las imagenes que suba el usuario --}}
                    </div>

                    <x-input-error for="imagen"></x-input-error>
                </div>
                {{-- todo Fin de imagen  --}}

                <div class="flex flex-row-reverse">
                    <button type="submit"
                        class="text-white rosa focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center"><i class="fa-solid fa-plus mr-2"></i>Crear
                        Categoría</button>
                        
                    <a class="mr-2 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
                        href="{{ route('Category.principal') }}"><i class="fa-solid fa-xmark mr-2"></i>Salir</a>
                </div>
            </form>
        </div>

        <script>
            function mostrarSelectPadres(value) {
                var selectPadres = document.getElementById('padre-select-container'); //? Seleccionamos el contenedor de selección de categorías padre

                if (value === 'hijo') { //* Si el valor es hijo, se muestra el contenedor de selección de categorías padre
                    selectPadres.style.display = 'block';
                } else { //? De lo contrario, se oculta
                    selectPadres.style.display = 'none';
                }
            }
            //? Esto es para que se muestre u oculte el select de categorías padre dependiendo del valor del select de tipo de categoría
            document.addEventListener('DOMContentLoaded', function() {
                mostrarSelectPadres(document.getElementById('tipo-categoria').value);
            });
        </script>


    </x-propio>
</x-app-layout>

<script>
    // Esta función se llama cada vez que el usuario selecciona archivos.
    function handleFiles(imagenes) {
        const previewContainer = document.getElementById('imagenPreview'); //? Donde se va a mostrar la imagen subida
        const contenedorImagenDefecto = document.getElementById('contenedorImagenDefecto'); //? Contenedor con la imagen por defecto.
        previewContainer.innerHTML = ''; // Limpiar las vistas previas existentes
        archivosSeleccionados = Array.from(imagenes); // Reiniciar y actualizar con los nuevos archivos

        if (imagenes.length > 0) { //* Si existe mas de una imagen el contenedor de la imagen por defecto se oculta
            contenedorImagenDefecto.style.display = 'none';
        } else { //* De lo contrario, se muestra el contenedor
            contenedorImagenDefecto.style.display = 'block';
        }

        // Para cada imagen seleccionada, crear una vista previa.
        Array.from(imagenes).forEach((imagen) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imgDiv = document.createElement('div'); //? Creamos un div 
                imgDiv.className = 'relative w-full w-3/8 md:w-3/8 text-center p-1'; //? Le damos unas clases css al div

                const img = document.createElement('img'); //? Creamos un atributo img para la imagen
                img.src = e.target.result; //? Asignamos en el src de la imagen, la imagen que se subio
                img.className = 'object-cover h-72 px-3 w-full rounded-lg'; //? Le damos unos estilos css a la imagen

                const deleteButton = document.createElement('button'); //? Creamos un elemento buttom, el cual sera la papelerar para borrar la imagen
                deleteButton.innerHTML =
                '<i class="fas fa-trash text-red-600"></i>'; //? Le metemos como texto un boton de una papelera con un color rojo de fontawesome
                deleteButton.className =
                    'absolute bottom-0 right-0 m-3 p-1  text-white rounded-full cursor-pointer'; //? Le damos unas clases al icono
                deleteButton.onclick = () => { //? Le asignamos un evento click al boton para borrar la imagen 
                    borrarPreview(imgDiv, imagen);
                };

                imgDiv.appendChild(img); //? Añadimos la imagen al div
                imgDiv.appendChild(deleteButton); //? Añadimos el boton de la papelera al div
                previewContainer.appendChild(imgDiv); //? Añadimos el div con la imagen y el boton de borrar al contenedor de la imagen preview definido en el html.
            };
            reader.readAsDataURL(imagen);
        });
    }

    //* Esta funcion se encarga de eliminar una vista previa y el archivo correspondiente en el input de subir archivos
    function borrarPreview(imgDiv, archivo) {
        const index = archivosSeleccionados.indexOf(archivo);
        if (index > -1) {
            archivosSeleccionados.splice(index, 1); //? Elimino el archivo del array solamente ese nos posicionamos en el indice y borramos ese indice
        }
        imgDiv.remove(); //? Elimino la vista del DOM

        //? Actualiza el input de archivos con los archivos restantes (el input de subir archivos) este se actualiza con el nombre del archivo si solo se sube uno o si hay =>2 se define el numero de archivos
        const dataTransfer = new DataTransfer();
        archivosSeleccionados.forEach(file => dataTransfer.items.add(file));
        document.getElementById('imagen').files = dataTransfer.files;

        // ? Si al borrar la iamgen subida se borra, mostrar el div con la imagen por defecto
        if (archivosSeleccionados.length === 0) {
            document.getElementById('contenedorImagenDefecto').style.display = 'block';
        }
    }

    // Este script se asegura de que el select de categorías padre se muestre u oculte adecuadamente.
    document.addEventListener('DOMContentLoaded', function() {
        mostrarSelectPadres(document.getElementById('tipo-categoria').value);
    });
</script>

{{-- <script>
    function mostrarSelectPadres(value) {
        var selectPadres = document.getElementById('padre-select-container');
        if(value == 'hijo') {
            selectPadres.style.display = 'block';
        } else {
            selectPadres.style.display = 'none';
        }
    }
</script> --}}
