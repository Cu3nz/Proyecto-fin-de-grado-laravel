<x-app-layout>
    {{-- todo Sergio 14 abril --}}
    <div class="container mx-auto mb-2 px-4">
        {{-- ? Miga de pan 6 --}}
        {{ Breadcrumbs::render('category.subcategorias', $subcategoriasDePadre) }}
        <h2 class="text-xl font-bold mb-4">Subcategorías de {{ $subcategoriasDePadre->nombre }}</h2>
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($subcategoriasDePadre->children as $subcategoria)
                <article class="flex flex-col duration-150 hover:scale-105 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <a href="{{ route('productosConSubcategoria', $subcategoria->id) }}" class="block">
                        <img class="w-full h-50 lg:h-48 object-cover" src="{{ Storage::url($subcategoria->image->url_imagen) }}" alt="{{ $subcategoria->image->desc_imagen }}" />
                    </a>
                    <div class="p-5 flex flex-col justify-between h-full">
                        <div>
                            <h5 class="text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-2">
                                {{ $subcategoria->nombre }}</h5>
                                <div class="overflow-y-auto scrollbar-hidden-y max-h-24 mb-2">
                                    <p class="text-sm text-gray-700 dark:text-gray-400">{{ $subcategoria->descripcion }}</p>
                                </div>
                        </div>
                        <div>
                            <span class="text-red-600">Category_padre_id:{{ $subcategoria->category_padre_id }}</span>
                            <span class="text-red-600 my-2">ID categoria:{{ $subcategoria->id }}</span>
                        </div>
                        <a class="mt-auto group relative flex w-full justify-center items-center overflow-hidden rounded bg-indigo-600 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500" href="{{route('productosConSubcategoria', $subcategoria->id)}}">
                            <span class="text-sm font-medium transition-all group-hover:translate-x-2">Ver más</span>
                            <svg class="h-5 w-5 transition-all opacity-0 group-hover:opacity-100 absolute right-16 mr-3 md:mr-0  transform group-hover:translate-x-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transition-delay: 75ms;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </section>
    </div>
</x-app-layout>
