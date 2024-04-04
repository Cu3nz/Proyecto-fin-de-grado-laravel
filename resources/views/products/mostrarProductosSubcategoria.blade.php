<x-app-layout>
    {{-- ? Miga de pan 7 --}}
    {{ Breadcrumbs::render('productosConSubcategoria', $categoriaPadre, $idDeSubcategoria) }}
    <x-propio>
        <section class=" gap-3  md:flex ">
            @foreach ($productos as $item)
            <a href="">
                <article>
                    <div
                        class="max-w-sm duration-150 hover:scale-105  bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ Storage::url($item->primeraImagen->url_imagen) }}"
                                alt="{{ $item->images->first()->desc_imagen }}" />
                        </a>
                        <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->nombre }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->descripcion }}</p>
                            <span class="text-red-600 inline-block">Precio: {{ $item->precio }}</span> <br><br>
                            <span class="text-red-600 mb-5 block">Stock: {{ $item->stock }}</span>

                            <a class="group  relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
                            href="{{route('overviewProduct' , $item -> id)}}"> {{-- ? Le paso el id del producto al cual he hecho click --}}
                            <span class="absolute -end-full transition-all group-hover:end-4">
                                <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                            <span class="text-sm font-medium transition-all group-hover:me-4">Ver más</span>
                        </a>
                        </div>
                    </div>
                </article>
            </a>
            @endforeach
        </section>



    </x-propio>
</x-app-layout>
