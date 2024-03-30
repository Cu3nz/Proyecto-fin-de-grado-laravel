<x-app-layout>
    <div class="container mx-auto px-4">
        <h2 class="text-xl font-bold mb-4">Subcategorías de {{ $subcategoriasDePadre->nombre }}</h2>
        <section class="grid  grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($subcategoriasDePadre->children as $subcategoria)
                <article
                    class="max-w-sm duration-150 hover:scale-105 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg object-cover object-center" src="{{ Storage::url($subcategoria->image->url_imagen) }}"
                            alt="{{ $subcategoria->image->desc_imagen }}" />
                    </a>
                    <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $subcategoria->nombre }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $subcategoria->descripcion}}
                        </p>
                        <span class="text-red-600 inline-block">Category_padre_id:{{$subcategoria -> category_padre_id}}</span> <br><br>
                        <span class="text-red-600 mb-5 block">ID categoria{{$subcategoria -> id}}</span> 
                        

                        <a class="group  relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500"
                            href="{{route('productosConSubcategoria' , $subcategoria ->  id)}}"> {{-- ? le pasamos la id padre de esa subcategoria , para que coja todos los productos en la tabla producto donde el atributo category_id tenga el mismo id que se pasa por esa ruta --}}
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
                </article>
            @endforeach
        </section>
    </div>
</x-app-layout>
