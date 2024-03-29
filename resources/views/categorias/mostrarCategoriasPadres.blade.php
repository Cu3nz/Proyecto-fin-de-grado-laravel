<x-app-layout>
    <x-propio>
        <section class="flex flex-col items-center md:flex-row md:justify-center md:flex-wrap">
            @foreach ($categoriasPadres as $item)
                <article class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
                    <a href="{{ route('category.subcategorias', $item->id) }}"> {{-- ? Le pasamos la id de la categoria padre, para coger las subcategorias de esa categoria padre --}}
                        <div class="bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <img class="p-8 rounded-t-lg" src="{{ Storage::url($item->image->url_imagen) }}"
                                alt="product image" />
                            <div class="px-5 pb-5">
                                <h5
                                    class="text-xl text-center font-semibold tracking-tight text-gray-900 dark:text-white">
                                    {{ $item->nombre }}</h5>
                                <div class="flex justify-center items-center mt-2.5 mb-5">
                                    <button
                                    class="overflow-hidden w-32 p-2 h-12 bg-black text-white border-none rounded-md text-xl font-bold cursor-pointer relative z-10 group"
                                  >
                                    Hover me!
                                    <span
                                      class="absolute w-36 h-32 -top-8 -left-2 bg-green-200 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-500 duration-700 origin-bottom"
                                    ></span>
                                    <span
                                      class="absolute w-36 h-32 -top-8 -left-2 bg-green-400 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-700 duration-500 origin-bottom"
                                    ></span>
                                    <span
                                      class="absolute w-36 h-32 -top-8 -left-2 bg-green-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform group-hover:duration-1000 duration-200 origin-bottom"
                                    ></span>
                                    <span
                                      class="group-hover:opacity-100 group-hover:duration-1000 duration-100 opacity-0 absolute top-2.5 left-6 z-10"
                                      >Explore!</span
                                    >
                                  </button>
                                  
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </section>
    </x-propio>
</x-app-layout>
