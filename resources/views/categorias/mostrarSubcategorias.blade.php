<x-app-layout>
    <div class="container mx-auto mb-2 px-4">
        {{-- ? Miga de pan 6 --}}
        {{ Breadcrumbs::render('category.subcategorias', $subcategoriasDePadre) }}
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
            @foreach ($subcategoriasDePadre->children as $subcategoria)
                <article class="flex flex-col duration-300 hover:scale-105 bg-white border hover:shadow-xl border-gray-200 rounded-lg shadow overflow-hidden">
                    <a href="{{ route('productosConSubcategoria', $subcategoria->id) }}" class="block">
                        <img class="rounded-t-lg object-cover w-full h-48" src="{{ Storage::url($subcategoria->image->url_imagen) }}" alt="{{ $subcategoria->image->desc_imagen }}" />
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h5 class="text-lg font-bold text-gray-900  mb-2">{{ $subcategoria->nombre }}</h5>
                        <div class="overflow-y-auto scrollbar-hidden-y max-h-24">
                            <p class="text-md text-black">{{ $subcategoria->descripcion }}</p>
                        </div>
                        <div class="flex-grow"></div> {{-- Esto es para que el botón siempre esté abajo de la tarjeta --}}
                        <a href="{{ route('productosConSubcategoria', $subcategoria->id) }}" class="mt-3 group relative flex justify-center items-center overflow-hidden rounded rosa transition duration-200 ease-in py-3 text-white focus:outline-none focus:ring active:bg-indigo-500">
                            <span class="text-sm font-medium transition-all group-hover:translate-x-2">Ver más</span>
                            <svg class="h-5 w-5 transition-all opacity-0 group-hover:opacity-100 absolute right-16 mr-10 sm:mr-13 transform group-hover:translate-x-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transition-delay: 75ms;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </section>
    </div>
</x-app-layout>
