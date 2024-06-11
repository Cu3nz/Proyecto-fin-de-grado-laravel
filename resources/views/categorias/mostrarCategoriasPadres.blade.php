<x-app-layout>
  {{-- Miga de pan --}}
  <x-propio>
      {{ Breadcrumbs::render('category.index') }}
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-6 px-4 py-5">
          @foreach ($categoriasPadres as $item)
              <article class="transform transition-transform duration-300 ease-in-out hover:scale-105">
                  <a href="{{ route('category.subcategorias', $item->id) }}" class="block">
                      <div class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg">
                          <img class="p-8 w-full h-96 object-cover rounded-t-lg" src="{{ Storage::url($item->image->url_imagen) }}" alt="{{ $item->image->desc_imagen }}" />
                          <div class="px-5 py-4">
                              <h5 class="text-xl font-semibold tracking-tight text-gray-900 text-center">{{ $item->nombre }}</h5>
                              <p class="mt-2 text-gray-700 text-center h-24 overflow-y-auto">{{ $item->descripcion }}</p>
                              <div class="flex justify-center mt-4">
                                  <a class="mt-auto group relative flex w-full justify-center items-center overflow-hidden rounded rosa transition duration-200 ease-in py-3 text-white focus:outline-none focus:ring active:bg-indigo-500" href="{{ route('category.subcategorias', $item->id) }}">
                                      <span class="text-sm font-medium transition-all group-hover:translate-x-2">Ver más</span>
                                      <svg class="h-5 w-5 transition-all opacity-0 group-hover:opacity-100 absolute right-16 mr-10 md:mr-10 transform group-hover:translate-x-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transition-delay: 75ms;">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                      </svg>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </a>
              </article>
          @endforeach
      </section>
  </x-propio>
</x-app-layout>
