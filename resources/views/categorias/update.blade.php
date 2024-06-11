<x-app-layout>
    {{-- ?  Miga de pan 3  --}}
    {{ Breadcrumbs::render('category.update', $category) }}
    <x-propio>
        
        <div class="mx-4 p-6 rounded-xl shadow-xl bg-gray-400 dark:text-gray-200 sm:w-1/2 sm:mx-auto">
            <form action="{{ route('category.update' , $category -> id) }}" method="POST" enctype="multipart/form-data" class="sm:max-w-lg sm:mx-auto">
                @csrf
                @method('put')
                <div class="mb-6">
                    <label for="nombre" class="block mb-2 text-md font-bold text-gray-900">Nombre de la categoría</label>
                    <input type="text" value="{{ old('nombre' , $category -> nombre) }}" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 font-bold text-md text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nombre de la categoría">
                    <x-input-error for="nombre"></x-input-error>
                </div>
                <div class="mb-6">
                    <label for="tipo-categoria" class="block mb-2 text-md font-bold text-gray-900">Tipo de categoría</label>
                    <select name="tipo" id="tipo-categoria" onchange="mostrarSelectPadres(this.value)" class="bg-gray-50 border border-gray-300 font-bold text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">---- Selecciona una opción --------</option>
                        <option value="padre" {{ $category->es_padre ? 'selected' : '' }}>Categoría Padre</option> {{-- ? Si la categoria es padre devuelve true osea 1, se deja seleccionada Padre --}}
                        <option value="hijo" {{ !$category->es_padre ? 'selected' : '' }}>Subcategoría</option> {{-- ? Si la categoria es subcategoria , devuelve false 0, por lo tanto selecciona Subcategoria  --}}
                    </select>
                    <x-input-error for="tipo"></x-input-error>
                </div>
                <div class="mb-6" id="padre-select-container" style="display: none;">
                    <label for="select-padres" class="block mb-2 text-md font-bold text-gray-900">Categoría Padre</label>
                    <select name="category_padre_id" id="select-padres" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="">---- Selecciona una opción --------</option>
                        @foreach($categoriasPadres as $categoriaPadre)
                            <option value="{{ $categoriaPadre->id }}" {{ old('category_padre_id', $category->category_padre_id) == $categoriaPadre->id ? 'selected' : '' }}>{{ $categoriaPadre->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category_padre_id"></x-input-error>
                </div>

                <div>
                    <label for="descripcion" class="block mb-2 text-md font-bold text-gray-900">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="bg-gray-50 border border-gray-300 font-bold text-gray-900 text-md rounded-lg mb-5 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Descripción de la categoría">{{ old('descripcion', $category->descripcion) }}</textarea>
                    <x-input-error for="descripcion"></x-input-error>
                </div>

                 {{-- todo Imagen --}}
                 <div class="mb-6">
                    <label for="imagen" class="block mb-2 text-md font-bold text-gray-900">Imágenes</label>
                    <input type="file" id="imagen" oninput="img.src=window.URL.createObjectURL(this.files[0])" name="imagen" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5 " />


                    <label for="desc_imagen" class="block mb-2 text-md font-bold text-gray-900">Descripción de la imagen</label>
                    <textarea name="desc_imagen" id="desc_imagen" placeholder="Escribe una descripción para todas la/las foto/s" class="mt-1 mb-5 block w-full text-black font-bold rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{old('desc_imagen', $category -> image -> desc_imagen)}}</textarea>
                    <x-input-error for="desc_imagen"></x-input-error>
                
                    <div class="w-full mt-2 px-5 md:w-3/8" id="contenedorImagenDefecto">
                        <img src="{{ Storage::url($category -> image -> url_imagen) }}" alt="{{$category -> image -> desc_imagen}}" class="w-full h-auto md:h-72 rounded object-cover border-4 border-black" id="img">
                    </div>

                
                    <x-input-error for="imagen"></x-input-error>
                </div>
                
                {{-- todo Fin de imagen  --}}

                <div class="flex flex-row-reverse">
                    <button type="submit"
                        class="text-white rosa focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center"><i class="fa-solid fa-rotate mr-2"></i>Actualizar Categoría</button>
                        
                    <a class="mr-2 bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
                        href="{{ route('Category.principal') }}"><i class="fa-solid fa-xmark mr-2"></i>Salir</a>
                </div>
            </form>
        </div>
        
        <script>
            function mostrarSelectPadres(value) {
                var selectPadres = document.getElementById('padre-select-container');
                if (value === 'hijo') {
                    selectPadres.style.display = 'block';
                } else {
                    selectPadres.style.display = 'none';
                }
            }
            // Asegurarse de que el contenedor de selección de categorías padre se muestre correctamente cuando se recargue la página con un valor previo seleccionado
            document.addEventListener('DOMContentLoaded', function() {
                mostrarSelectPadres(document.getElementById('tipo-categoria').value);
            });
        </script>
        

    </x-propio>
</x-app-layout>

<script>
    function mostrarSelectPadres(value) {
        var selectPadres = document.getElementById('padre-select-container');
        if(value == 'hijo') {
            selectPadres.style.display = 'block';
        } else {
            selectPadres.style.display = 'none';
        }
    }
</script>