<x-app-layout>
    {{-- ! Cmaibado ahora el boton de ver mas siempre esta abajo de la card independientemente de la descripcion que tenga  --}}
    {{ Breadcrumbs::render('productosConSubcategoria', $categoriaPadre, $idDeSubcategoria) }}
    <x-propio>
        
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 px-4 py-5">
            @foreach ($productos as $item)
                <article class="flex flex-col duration-150 hover:scale-105 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                    <a href="{{ route('overviewProduct', $item->id) }}" class="block">
                        <img class="rounded-t-lg object-cover w-full h-48" src="{{ Storage::url($item->primeraImagen->url_imagen) }}" alt="{{ $item->images->first()->desc_imagen }}" />
                    </a>
                    <div class="p-4 flex flex-col flex-grow">
                        <h5 class="text-lg font-bold text-gray-900 dark:text-white mb-2">{{ $item->nombre }}</h5>
                        <div class="overflow-y-auto scrollbar-hidden-y max-h-24">
                            <p class="text-sm text-gray-700 dark:text-gray-400">{{ $item->descripcion }}</p>
                        </div>
                        <div class="flex-grow"></div> {{-- ! Esto es para que el boton siempre este abajo de la card --}}
                        <div class="mt-4">
                            <span class="text-lg font-semibold text-gray-300">{{ $item->precio }}€</span>
                        </div>
                        <a href="{{ route('overviewProduct', $item->id) }}" class="mt-3 group relative flex justify-center items-center overflow-hidden rounded bg-indigo-600 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500">
                            <span class="text-sm font-medium transition-all group-hover:translate-x-2">Ver más</span>
                            <svg class="h-5 w-5 transition-all opacity-0 group-hover:opacity-100 absolute right-16 mr-3 md:mr-0 transform group-hover:translate-x-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transition-delay: 75ms;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </section>

    </x-propio>
</x-app-layout>