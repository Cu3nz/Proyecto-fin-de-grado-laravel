<x-app-layout>
    <x-propio>
        <h1 class="text-center text-4xl">id del producto <span class="text-red-600">{{$product -> id}}</span></h1>

        <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    theme: {
      extend: {
        gridTemplateRows: {
          '[auto,auto,1fr]': 'auto auto 1fr',
        },
      },
    },
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Men</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
          <li>
            <div class="flex items-center">
              <a href="#" class="mr-2 text-sm font-medium text-gray-900">Clothing</a>
              <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
  
          <li class="text-sm">
            <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">Basic Tee 6-Pack</a>
          </li>
        </ol>
      </nav>
  
      <!-- Image gallery -->
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-3 lg:gap-x-8">
        @foreach ($imagenes as $index => $item)    
            @if ($index == 0)
                <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
                    <img src="{{ Storage::url($item->url_imagen) }}" alt="{{$item -> desc_imagen}}" class="h-full w-full object-cover object-center">
                </div>
            @elseif ($index == 1 || $index == 2)
                <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
                    <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg flex items-center justify-center">
                        <img src="{{ Storage::url($item->url_imagen) }}" alt="{{$item -> desc_imagen}}" class="max-h-96 max-w-full object-cover">
                    </div>
                </div>
            @elseif ($index == 3 || $index == 4)
                <div class="aspect-h-4 aspect-w-3 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
                    <img src="{{ Storage::url($item->url_imagen) }}" alt="{{$item -> desc_imagen}}" class="h-full w-full object-cover object-center">
                </div>
            @endif
        @endforeach
    </div>
    
      <!-- Product info -->
      <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{$product -> nombre}}</h1>
        </div>
  
        <!-- Options -->
        <div class="mt-4 lg:row-span-3 lg:mt-0">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl tracking-tight text-gray-900">{{$product -> precio}}€</p>
          <p @class(["text-3xl tracking-tight text-gray-900",
          "hidden" => $product -> stock == 0, 
          "block" => $product -> stock >= 1])>Unidades listas para enviar:{{$product -> stock}}</p>
          
  
  
          <form class="mt-10">
            <!-- Colors -->
            
            <button type="submit" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add to bag</button>
          </form>
        </div>
  
        <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
          <!-- Description and details -->
          <div>
            <h3 class="sr-only">Description</h3>
  
            <div class="space-y-6">
              <p class="text-base text-gray-900">{{$product -> descripcion}}</p>
            </div>
          </div>
  
          <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
  
            <div class="mt-4">
              <ul role="list" class="list-disc space-y-2 pl-4 text-sm">
                <li class="text-gray-400"><span class="text-gray-600">Hand cut and sewn locally</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Dyed with our proprietary colors</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Pre-washed &amp; pre-shrunk</span></li>
                <li class="text-gray-400"><span class="text-gray-600">Ultra-soft 100% cotton</span></li>
              </ul>
            </div>
          </div>
  
          <div class="mt-10">
            <h2 class="text-sm font-medium text-gray-900">Details</h2>
  
            <div class="mt-4 space-y-6">
              <p class="text-sm text-gray-600">{{$product -> descripcion}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div>
    Productos relacionados

    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
        @foreach ($productosRelacionadosCategoria as $item)
            <div class="flex flex-col gap-4">
                <a href="{{ route('overviewProduct', $item->id) }}">
                    <article class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-150 ease-in-out">
                        <img class="rounded-t-lg object-cover object-center h-48 w-full" src="{{ Storage::url($item->primeraImagen->url_imagen) }}" alt="{{ $item->images->first()->desc_imagen }}">
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $item->nombre }}</h5>
                            <p class="mb-3 font-normal text-gray-700">{{ $item->descripcion }}</p>
                            <div class="flex items-center mb-3">
                                <span class="text-xl font-semibold text-red-600">Precio: {{ $item->precio }}</span>
                                <span class="ml-3 text-sm text-gray-500 line-through">€{{ $item->precio_original }}</span>
                            </div>
                            <div class="flex items-center mb-3">
                                <span class="text-red-600">Stock: {{ $item->stock }}</span>
                            </div>
                           {{--  <div class="flex items-center mb-4">
                                {!! str_repeat('★', $item->valoracion) !!}{{ str_repeat('☆', 5 - $item->valoracion) }}
                                <span class="ml-2 text-sm text-gray-600">({{ $item->numero_valoraciones }})</span>
                            </div> --}}
                            <a href="{{ route('overviewProduct', $item->id) }}" class="group  relative inline-flex items-center overflow-hidden rounded bg-indigo-600 px-8 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500">
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
                </a>
            </div>
        @endforeach
    </div>
    

    </x-propio>
</x-app-layout>