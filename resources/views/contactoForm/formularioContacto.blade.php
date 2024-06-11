<x-app-layout>
    
    <div class="w-96 h-100 sm:w-3/4 lg:w-1/2 sm:my-10  mx-auto p-6 rounded-xl shadow-xl bg-gray-600 dark:text-gray-200">
        <form action="{{ route('mail.enviar') }}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" value="{{ old('nombre', Auth::check() ? Auth::user()->name : '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nombre..." name="nombre">
                <x-input-error for="nombre"></x-input-error>
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example@gmail.com" name="email">
                <x-input-error for="email"></x-input-error>
            </div>

            <div class="mb-5">
                <label for="categoriasoporte" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una categoría</label>
                <select id="categoriasoporte" name="categoriasoporte"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">--------- Seleccione una categoría -------------</option>
                    <option value="error en el pedido" @if(old('categoriasoporte') == 'error en el pedido') selected @endif>Error con mi pedido</option>
                    <option value="producto defectuoso" @if(old('categoriasoporte') == 'producto defectuoso') selected @endif>Producto defectuoso</option>
                    <option value="problemas a la hora de realizar el pago" @if(old('categoriasoporte') == 'problemas a la hora de realizar el pago') selected @endif>Problemas de pago</option>
                    <option value="devoluciones reembolsos" @if(old('categoriasoporte') == 'devoluciones reembolsos') selected @endif>Devoluciones y reembolsos</option>
                    <option value="consulta producto" @if(old('categoriasoporte') == 'consulta producto') selected @endif>Consulta sobre un producto</option>
                    <option value="problemas entrega" @if(old('categoriasoporte') == 'problemas entrega') selected @endif>Problemas con la entrega</option>
                    <option value="consulta cuenta" @if(old('categoriasoporte') == 'consulta cuenta') selected @endif>Consulta sobre mi cuenta</option>
                    <option value="otros" @if(old('categoriasoporte') == 'otros') selected @endif>Otros</option>
                </select>
                <x-input-error for="categoriasoporte"></x-input-error>
            </div>

            <div class="mb-5">
                <label for="contenido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                <textarea id="contenido" name="contenido"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Introduce toda la información lo mas detallada posible">{{ old('contenido') }}</textarea>
                <x-input-error for="contenido"></x-input-error>
            </div>

            <div class="mb-5">
                <label for="dropzone-file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sube tus imágenes</label>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" accept="image/*" name="images[]" type="file" class="hidden" multiple />
                    </label>
                </div>
                <div id="preview" class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                <x-input-error for="images"></x-input-error>
                <x-input-error for="images.*"></x-input-error>
            </div>

            <div class="flex flex-row-reverse">
                <button type="submit" class="rosa text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-paper-plane mr-2"></i> Enviar
                </button>
                
                <a href="{{ route('welcome') }}"
                    class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-xmark mr-2"></i> Cancelar</a>
            </div>
        </form>
    </div>

    <script>
        var archivos = [];

        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('dropzone-file');
            const dropzone = document.querySelector('label[for="dropzone-file"]');
            const preview = document.getElementById('preview');

            const displayImages = (files) => {
                preview.innerHTML = '';
                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = () => {
                        const imgContainer = document.createElement('div');
                        imgContainer.classList.add('relative', 'w-full', 'flex', 'justify-center');

                        const img = document.createElement('img');
                        img.src = reader.result;
                        img.classList.add('max-w-full', 'h-auto', 'rounded-lg', 'shadow-md');

                        const deleteButton = document.createElement('button');
                        deleteButton.classList.add('absolute', 'top-0', 'right-0', 'bg-gray-700', 'text-white', 'font-bold', 'py-1', 'px-2', 'rounded');
                        deleteButton.innerHTML = '<i class="fas fa-trash text-white"></i>';
                        deleteButton.addEventListener('click', (e) => {
                            e.preventDefault();
                            archivos.splice(index, 1);
                            updatePreviews();
                            syncInputFiles();
                        });

                        imgContainer.appendChild(img);
                        imgContainer.appendChild(deleteButton);
                        preview.appendChild(imgContainer);
                    };
                    reader.readAsDataURL(file);
                });
            };

            const updatePreviews = () => {
                displayImages(archivos);
            };

            const syncInputFiles = () => {
                const dt = new DataTransfer();
                archivos.forEach(file => dt.items.add(file));
                input.files = dt.files;
            };

            input.addEventListener('change', (e) => {
                if (e.target.files.length) {
                    const nuevosArchivos = Array.from(e.target.files);
                    archivos = archivos.concat(nuevosArchivos);
                    updatePreviews();
                    syncInputFiles();
                }
            });

            dropzone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzone.classList.add('bg-gray-100', 'dark:bg-gray-600');
            });

            dropzone.addEventListener('dragleave', () => {
                dropzone.classList.remove('bg-gray-100', 'dark:bg-gray-600');
            });

            dropzone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzone.classList.remove('bg-gray-100', 'dark:bg-gray-600');
                if (e.dataTransfer.files.length) {
                    const nuevosArchivos = Array.from(e.dataTransfer.files);
                    archivos = archivos.concat(nuevosArchivos);
                    updatePreviews();
                    syncInputFiles();
                }
            });
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form');
        form.addEventListener('submit', (event) => {
            console.log('Formulario enviado');
            console.log('Datos del formulario:', new FormData(form));
        });
    });
</script>

</x-app-layout>
