<x-app-layout>
  {{-- ? Vista cambiada por completo, comentarios fotos,  boton de leer mas y menos y imagenes que ha subido el usuario en la review justo debajo del texto 4 de mayo --}}
    <h1 class="text-center text-4xl">id del producto <span class="text-red-600">{{$product -> id}}</span></h1>
<div class="bg-white">
<div class="mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
  <!-- Product -->
  <div class="py-3">
    {{-- ? Miga de pan 8 --}}
    {{ Breadcrumbs::render('productOverviews', $categoriaPadre, $subcategoria, $product) }}
  </div>
  <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">

  <!--Image gallery -->
<div class=" mb-5 lg:col-span-1"> {{-- todo Se puede cambiar por article --> --}}
<div class="flex flex-col">
<!-- Main image, always shown -->
<img id="mainImage" src="{{Storage::url($primeraImagen -> url_imagen)}}" alt="{{$primeraImagen -> desc_imagen}}" class="h-full w-full object-cover object-center sm:rounded-lg">

{{-- todo Imagenes que son minuaturas --}}
<div class="mt-6 grid grid-cols-4 gap-6 sm:grid-cols-4">
  {{-- ? Repetir la primera imagen pero ya con un foreach --}}
  @foreach ($imagenes as $imagen)
  <button class="miniatura relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" data-image="{{Storage::url($imagen -> url_imagen)}}">
      <span class="absolute inset-0 overflow-hidden rounded-md">
        <img src="{{Storage::url($imagen -> url_imagen)}}" alt="{{$imagen -> desc_imagen}}" class="h-full w-full object-cover object-center">
      </span>
    </button>
  {{-- <button class="miniatura relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" data-image="https://a.cdn-hotels.com/gdcs/production10/d1442/77b32160-68ce-11e8-8a0f-0242ac11000c.jpg">
      <span class="absolute inset-0 overflow-hidden rounded-md">
        <img src="https://a.cdn-hotels.com/gdcs/production10/d1442/77b32160-68ce-11e8-8a0f-0242ac11000c.jpg" alt="Bichitos Zaragoza" class="h-full w-full object-cover object-center">
      </span>
    </button>
  <button class="miniatura relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" data-image="https://hips.hearstapps.com/hmg-prod/images/07-ss300p-ehra-lessien-1567611990-1-1567790807.jpg?crop=1xw:0.84375xh;center,top&resize=1200:*">
      <span class="absolute inset-0 overflow-hidden rounded-md">
        <img src="https://hips.hearstapps.com/hmg-prod/images/07-ss300p-ehra-lessien-1567611990-1-1567790807.jpg?crop=1xw:0.84375xh;center,top&resize=1200:*" alt="Bichito buggatti" class="h-full w-full object-cover object-center">
      </span>
    </button>
  <button class="miniatura relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" data-image="https://img.remediosdigitales.com/49aa86/hss-storage-midas-994c14fecc8c90586fda7011b437db06-205190306-1-copia/450_1000.jpg">
      <span class="absolute inset-0 overflow-hidden rounded-md">
        <img src="https://img.remediosdigitales.com/49aa86/hss-storage-midas-994c14fecc8c90586fda7011b437db06-205190306-1-copia/450_1000.jpg" alt="Lucia Ferrari" class="h-full w-full object-cover object-center">
      </span>
    </button> --}}
    @endforeach
</div>
</div>
</div>


  <!-- Product details -->
  <div class="lg:col-span-1 lg:row-span-3">
    <div class="flex flex-col-reverse">
      <div class="mt-4">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{$product -> nombre}}</h1>
        <p class="mt-3 text-black font-bold">{{$product -> codigo_articulo}}</p>

        {{-- <h2 id="information-heading" class="sr-only">Product information</h2>
        <p class="mt-2 text-sm text-gray-500">Version 1.0 (Updated <time datetime="2021-06-05">June 5, 2021</time>)</p> --}}
      </div>

      <div>
        <h3 class="sr-only">Reviews</h3>
        <a href="#reseña">
        <div class="flex items-center">
          <!-- Active: "text-yellow-400", Default: "text-gray-300" -->
          <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
          <svg class="text-gray-300 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
          </svg>
        </div>
        <p class="sr-only">4 out of 5 stars</p>
      </div>
    </div>
    </a>
    <p class="mt-6 text-gray-500">{{$product -> descripcion}}</p>
    <p class="mt-3 text-gray-500">{{$product -> category -> nombre}}</p>
    <p class="mt-3 text-gray-500">{{$product -> precio}}€</p>
    
    
      <p @class(["mt-3 text-gray-500",
      "hidden" => $product->stock == 0])>Unidades lista para enviar: <span @class(["text-green-600 fw-bold" => $product->stock >= 8 && $product->stock <= 30, 
      "text-orange-500" => $product->stock >= 5 && $product->stock <= 7,
      "text-red-600" => $product->stock >= 1 && $product->stock <= 4])>{{$product->stock}} unidades</span></p>
  

  <div class="mt-10 flex">
    @if($product->estado == 'DISPONIBLE')
      <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Añadir al carrito</button>
    @else
      <p class="text-red-500 font-bold flex items-center">Actualmente el producto no está disponible</p>
    @endif
    
      {{-- ! Corazon de twitter --}}
      <div class="like-button ml-4 relative">
        <form id="like-form" action="{{ route('alternarLike', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="heart-bg w-16 h-16 flex items-center justify-center">
                <div class="heart-icon w-16 h-16 bg-contain bg-no-repeat cursor-pointer {{ auth()->user() && auth()->user()->likedProducts->contains($product->id) ? 'liked' : '' }}"></div>
            </button>
        </form>
    </div>
    </div>

    <div class="mt-10 border-t border-gray-200 pt-10">
      <h3 class="text-sm font-medium text-gray-900">Highlights</h3>
      <div class="prose prose-sm mt-4 text-gray-500">
        <ul role="list">
          <li>200+ SVG icons in 3 unique styles</li>
          <li>Compatible with Figma, Sketch, and Adobe XD</li>
          <li>Drawn on 24 x 24 pixel grid</li>
        </ul>
      </div>
    </div>

    <div class="mt-10 border-t border-gray-200 pt-10">
      <h3 class="text-sm font-medium text-gray-900">License</h3>
      <p class="mt-4 text-sm text-gray-500">For personal and professional use. You cannot resell or redistribute these icons in their original or modified state. <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Read full license</a></p>
    </div>

    <div class="mt-10 border-t border-gray-200 pt-10">
      <h3 class="text-sm font-medium text-gray-900">Compartir en:</h3>
      <ul role="list" class="mt-4 flex items-center space-x-6">
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url($product -> id)) }}" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500" target="_blank">
          <span class="sr-only">Share on Facebook</span>
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
            <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
          </svg>
          </a>
        </li>
        </li>
        <li>
          <a href="#" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
            <span class="sr-only">Share on Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
        </li>
        <li>
          <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url($product -> nombre)) }}" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500" target="_blank">
            <span class="sr-only">Share on X</span>
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
              <path d="M11.4678 8.77491L17.2961 2H15.915L10.8543 7.88256L6.81232 2H2.15039L8.26263 10.8955L2.15039 18H3.53159L8.87581 11.7878L13.1444 18H17.8063L11.4675 8.77491H11.4678ZM9.57608 10.9738L8.95678 10.0881L4.02925 3.03974H6.15068L10.1273 8.72795L10.7466 9.61374L15.9156 17.0075H13.7942L9.57608 10.9742V10.9738Z" />
            </svg>
          </a>
        </li>
        <li>
          <a href="https://api.whatsapp.com/send?text={{ urlencode(Request::url($product -> nombre)) }}" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500" target="_blank">
            <span class="sr-only">Share on WhatsApp</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
              <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
    <div>
      <div class="border-b border-gray-200">
        <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
          <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800" -->
          <button id="tab-reviews-btn" data-target="#tab-panel-reviews" class="tab-btn border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium" role="tab" type="button">Customer Reviews</button>
          <button id="tab-faq-btn" data-target="#tab-panel-faq" class="tab-btn border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium" role="tab" type="button">FAQ</button>
          <button id="tab-license-btn" data-target="#tab-panel-license" class="tab-btn border-transparent text-gray-700 hover:border-gray-300 hover:text-gray-800 whitespace-nowrap border-b-2 py-6 text-sm font-medium" role="tab" type="button">License</button>
        </div>
      </div>
      <span id="reseña"></span>
      <!-- 'Customer Reviews' panel, show/hide based on tab state -->
      <div id="tab-panel-reviews" class="-mb-10 tab-panel" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
        <h3 class="sr-only">Customer Reviews</h3>
        <div class="bg-white">
          <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-12 lg:gap-x-8 lg:px-8 lg:py-32">
            <section class="lg:col-span-4">
              <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customer Reviews</h2>
        
              <div class="mt-3 flex items-center">
                <div>
                  <div class="flex items-center">
                    <!-- Active: "text-yellow-400", Default: "text-gray-300" -->
                    <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                    </svg>
                  </div>
                  <p class="sr-only">4 out of 5 stars</p>
                </div>
                <p class="ml-2 text-sm text-gray-900"> Este producto tiene <span class="font-bold">{{$product->reviews->count()}}</span> reviews</p>
              </div>
        
              <div class="mt-6">
                <h3 class="sr-only">Review data</h3>
        
                <dl class="space-y-3">
                  <div class="flex items-center text-sm">
                    <dt class="flex flex-1 items-center">
                      <p class="w-3 font-medium text-gray-900">5<span class="sr-only"> star reviews</span></p>
                      <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
        
                        <div class="relative ml-3 flex-1">
                          <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                          <div style="width: calc(1019 / 1624 * 100%)" class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"></div>
                        </div>
                      </div>
                    </dt>
                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">63%</dd>
                  </div>
                  <div class="flex items-center text-sm">
                    <dt class="flex flex-1 items-center">
                      <p class="w-3 font-medium text-gray-900">4<span class="sr-only"> star reviews</span></p>
                      <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
        
                        <div class="relative ml-3 flex-1">
                          <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                          <div style="width: calc(162 / 1624 * 100%)" class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"></div>
                        </div>
                      </div>
                    </dt>
                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">10%</dd>
                  </div>
                  <div class="flex items-center text-sm">
                    <dt class="flex flex-1 items-center">
                      <p class="w-3 font-medium text-gray-900">3<span class="sr-only"> star reviews</span></p>
                      <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
        
                        <div class="relative ml-3 flex-1">
                          <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                          <div style="width: calc(97 / 1624 * 100%)" class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"></div>
                        </div>
                      </div>
                    </dt>
                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">6%</dd>
                  </div>
                  <div class="flex items-center text-sm">
                    <dt class="flex flex-1 items-center">
                      <p class="w-3 font-medium text-gray-900">2<span class="sr-only"> star reviews</span></p>
                      <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
        
                        <div class="relative ml-3 flex-1">
                          <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                          <div style="width: calc(199 / 1624 * 100%)" class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"></div>
                        </div>
                      </div>
                    </dt>
                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">12%</dd>
                  </div>
                  <div class="flex items-center text-sm">
                    <dt class="flex flex-1 items-center">
                      <p class="w-3 font-medium text-gray-900">1<span class="sr-only"> star reviews</span></p>
                      <div aria-hidden="true" class="ml-1 flex flex-1 items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                        </svg>
        
                        <div class="relative ml-3 flex-1">
                          <div class="h-3 rounded-full border border-gray-200 bg-gray-100"></div>
                          <div style="width: calc(147 / 1624 * 100%)" class="absolute inset-y-0 rounded-full border border-yellow-400 bg-yellow-400"></div>
                        </div>
                      </div>
                    </dt>
                    <dd class="ml-3 w-10 text-right text-sm tabular-nums text-gray-900">9%</dd>
                  </div>
                </dl>
              </div>
        
              <div class="mt-10">
                <h3 class="text-lg font-medium text-gray-900">Valorar este producto</h3>
                <p class="mt-1 text-sm text-gray-600">Comparte tu opinión con otros clientes<p>
                <a href="{{route('reviews.create' , $product->id)}}" class="mt-6 inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-8 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 sm:w-auto lg:w-full">Escribe una Reseña</a>
              </div>
            </section>
        

            
            <div class="mt-16 lg:col-span-7 lg:col-start-6 lg:mt-0">
              {{-- ! Aqui va definido el carousel de imagenes que ha subido los usuarios para el producto --}}
              @if(count($reseñasUsuariosEnProuctos))
              @if(count($imagenesReseña))
              <span class="text-xl font-bold">Reseñas con imagenes</span>
              {{-- todo Carousel --}}
              <div id="carousel" class="relative overflow-hidden">
                <div id="carouselInterior" class=" mt-1 mr-3 mb-4 flex transition-transform"> 
                  @foreach ($imagenesReseña as $imagen)
                  <div class="flex-none w-1/4 sm:2/4 mr-1">
                    <img src="{{ Storage::url($imagen->url_imagen) }}" alt="{{$imagen -> desc_imagen}}" class="w-full h-48 object-cover rounded-lg">
                  </div>
                  @endforeach
                </div>
                {{-- ? Controles --}}
                <button id="prevButton" onclick="desplazarCarrusel(-1)" class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                  &#10094; <!-- Flecha izquierda -->
                </button>
                <button id="nextButton" onclick="desplazarCarrusel(1)" class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full z-10">
                  &#10095; <!-- Flecha derecha -->
                </button>
              </div>          
              {{-- todo Fin  Carousel --}}
              @else 
              @endif

              
              
                        {{-- ! Aqui van los comentarios --}}
              <div class="max-w-full py-9 overflow-hidden">
              <span class="sr-only">Aqui van los comentarios</span>
              {{-- ?  Toma las últimas 6 reseñas y reviértelas para que se muestren en orden cronologico --}}
              @foreach ($reseñasUsuariosEnProuctos->take(6) as $item)
              @php
              $totalLength = strlen($item->reseña) + strlen($item->pros) + strlen($item->contras); // calculo el numero de caracteres total entre los campos del formulario reseña, pros y contras
              @endphp
              <div class="flow-root">
                  <div class="my-4 sm:my-5 md:my-6 lg:my-8 divide-y divide-gray-600">
                      <div class="py-2 sm:py-3 md:py-4 lg:py-6">
                        <div class="flex items-center">
                          <img src="{{$item->user->profile_photo_url}}" loading="lazy" alt="Imagen de perfil del usuario {{$item -> user -> name}}" class="h-12 w-12 rounded-full">
                          <div class="ml-4">
                              <h4 class="text-sm font-bold text-gray-900">{{$item->user->name}}</h4>
                              <div class="mt-1 flex items-center" id="star-container-{{$item->id}}">
                                @for ($i = 1; $i <= 5; $i++)
                                <i name="puntuacion-{{$item->id}}" class="far fa-star text-yellow-400 text-xl cursor-pointer"
                                  id="star-{{$item->id}}-{{$i}}"></i>
                                @endfor
                                  <span class="font-bold ml-2">{{$item->titulo}}</span>
                              </div>
                              <span>{{$item->created_at->format('d/m/Y')}}</span>
                              <input type="hidden" name="puntuacion" id="puntuacion-{{$item->id}}" value="{{$item->puntuacion}}">
                          </div>
                      </div>
                          <div class="mt-4 text-base italic text-black" id="content-container-{{$item->id}}">
                              <p id="review-text-{{$item->id}}" class="{{ $totalLength > 150 ? 'line-clamp-3' : '' }}">
                                  {{$item->reseña}}
                              </p>
                              @if(isset($item -> pros) && isset($item -> contras))
                              <p id="pros-text-{{$item->id}}" class="{{ $totalLength > 150 ? 'line-clamp-3' : '' }}">
                                  <span class="font-bold text-green-600">Pros:</span> {{$item->pros}}
                              </p>
                              <p id="contras-text-{{$item->id}}" class="{{ $totalLength > 150 ? 'line-clamp-3' : '' }}">
                                  <span class="font-bold text-red-600">Contras:</span> {{$item->contras}}
                              </p>
                              @else
                              @endif

                              {{-- ? como ya tengo las imagenes cargadas de cada review con el metodo recuperarImagenesReviewsProducto y dentro de este foreach estoy recorriendo cada review que hacen los usuarios gracias al metodo obteneReviewsDelProductoConUsuarios y a la variable "reseñasUsuariosEnProuctos" lo unico que me falta es añadir la relacionreviewMultiMedia para acceder a las imagenes de cada review  --}}
                              <div class="flex mr-5 mt-2">
                                @foreach ($item->reviewMultiMedia as $media)
                                <div class="flex-none w-1/4 sm:2/4 mr-1">
                                <img src="{{ Storage::url($media->url_imagen) }}" loading="lazy" title="{{$media->desc_imagen}}" alt="{{ $media->desc_imagen }}" class="w-full mr-2 h-48 object-cover rounded-lg" aria-hidden="true">
                                <span class="sr-only">{{$media->desc_imagen}}</span>
                                </div>
                                @endforeach
                              </div>

                              @if ($totalLength > 150)
                              <button class="read-more-btn text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out" data-review-id="{{$item->id}}" data-expanded="false">
                                  Leer más
                              </button>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach

              @if(count($reseñasUsuariosEnProuctos) >= 6) {{-- ? En cuanto haya 6 reseñas o mas el boton de leer mas reseñas aparece  --}}
            <div class="flex justify-center mt-5">
                <a href="#" id="read-more-reviews" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                  Leer más reseñas
                </a>
              </div>
                @endif
          </div>
              @else
                <div class="mt-6 flex justify-center">  
                <span class="text-xl font-bold">Aún no hay reseñas para "{{$product->nombre }}".Sé el primero en compartir tu experiencia.</span>
                </div>

              @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 'FAQ' panel, show/hide based on tab state -->
      <div id="tab-panel-faq" class=" hidden tab-panel text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
        <h3 class="sr-only">Frequently Asked Questions</h3>

        <dl>
          <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
          <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
            <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
          </dd>
          <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
          <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
            <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
          </dd>
          <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
          <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
            <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
          </dd>
          <dt class="mt-10 font-medium text-gray-900">Can I use the icons at different sizes?</dt>
          <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
            <p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or larger than 64 x 64 to retain legibility and visual balance.</p>
          </dd>

          <!-- More FAQs... -->
        </dl>
      </div>

      <!-- 'License' panel, show/hide based on tab state -->
      <div id="tab-panel-license" class=" hidden tab-panel pt-10" aria-labelledby="tab-license" role="tabpanel" tabindex="0">
        <h3 class="sr-only">License</h3>

        <div class="prose prose-sm max-w-none text-gray-500">
          <h4>Overview</h4>

          <p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>

          <ul role="list">
            <li>You're allowed to use the icons in unlimited projects.</li>
            <li>Attribution is not required to use the icons.</li>
          </ul>

          <h4>What you can do with it</h4>

          <ul role="list">
            <li>Use them freely in your personal and professional work.</li>
            <li>Make them your own. Change the colors to suit your project or brand.</li>
          </ul>

          <h4>What you can't do with it</h4>

          <ul role="list">
            <li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>
            <li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</body>


<div class="mt-5 mb-5">
<span class="font-bold text-xl text-center sm:text-left px-4 lg:px-5">Productos relacionados</span>
<div class="mt-6">
  <div class=" mx-4  grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
      @foreach ($productosRelacionadosCategoria as $item)
          <div class="flex flex-col gap-10">
              <article class="bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-150 ease-in-out flex flex-col justify-between h-full">
                  <a href="{{ route('overviewProduct', $item->id) }}">
                    <img class="rounded-t-lg object-cover object-center h-48  w-full" src="{{ Storage::url($item->primeraImagen->url_imagen) }}" alt="{{ $item->images->first()->desc_imagen }}">
                  </a>
                  <div class="p-5 flex flex-col justify-between flex-grow">
                      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $item->nombre }}</h5>
                      <p class="mb-3 font-normal text-gray-700 overflow-y-auto cursor-row-resize	 scrollbar-hidden-y max-h-24">{{ $item->descripcion }}</p>
                      <div class="mt-auto">
                          <span class="text-lg font-semibold text-gray-900">{{ $item->precio }}€</span>
                          <a href="{{ route('overviewProduct', $item->id) }}" class="group relative w-full flex justify-center items-center overflow-hidden rounded bg-indigo-600 py-3 text-white focus:outline-none focus:ring active:bg-indigo-500 mt-3">
                            <span class="text-sm font-medium transition-all group-hover:translate-x-2">Ver más</span>
                            <svg class="h-5 w-5 transition-all opacity-0 group-hover:opacity-100 absolute right-16 mr-8 transform group-hover:translate-x-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="transition-delay: 75ms;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                          </a>
                      </div>
                  </div>
              </article>
          </div>
      @endforeach
  </div>
</div>
</div>







{{-- todo Para que tenga efecto sobre la imagen  --}}

<script>
const miniaturas = document.querySelectorAll('.miniatura');
const mainImage = document.getElementById('mainImage');

//? Funcion que inicia la transiccion de las imagenes
function fadeImage(newSrc, newAlt) {
// Primero, disminuimos la opacidad a 0 para iniciar la transición de salida
mainImage.classList.add('opacity-0', 'transition-opacity', 'duration-500', 'ease-in-out');

// Esperamos a que se complete la transición de salida
setTimeout(() => {
// Actualizamos la imagen y el texto alt
mainImage.src = newSrc;
mainImage.alt = newAlt;

//? Esperamos un poco antes de iniciar la transicion de entrada
setTimeout(() => {
  //? Restablecemos la opacidad a 1 para iniciar la transición de entrada
  mainImage.classList.remove('opacity-0'); //? Borramos la opacidad
}, 20); 
}, 300); //? Duracion de la transicion de salida
}

//? Agregamos un evento 'click' a cada miniatura
miniaturas.forEach(miniatura => {
miniatura.addEventListener('click', function() {
//? Obtengo la nueva imagen y el texto alt de los atributos de la miniatura
const newSrc = this.getAttribute('data-image');
const newAlt = this.querySelector('img').getAttribute('alt');

// Llamamos a la funcion con la nueva imagen y el alt
fadeImage(newSrc, newAlt);
});
});
</script>


<!-- ! Para las pestañas -->
<script>
//? Seleccionamos todos los botones de pestaña mediante un atributo de la clase
const tabs = document.querySelectorAll('.tab-btn');

tabs.forEach(tab => {
  tab.addEventListener('click', function() {
    //? Ocultamos todos los paneles
    document.querySelectorAll('.tab-panel').forEach(panel => {
      panel.classList.add('hidden');
    });
    
    //? Quitamos la clase activa de todos los botones
    tabs.forEach(tab => {
      tab.classList.remove('border-indigo-600', 'text-indigo-600');
      tab.classList.add('border-transparent', 'text-gray-700');
    });

    //? Mostramos el panel correspondiente
    const targetPanel = document.querySelector(this.getAttribute('data-target'));
    targetPanel.classList.remove('hidden');

    //? Añadimos la clase activa al boton actual
    this.classList.remove('border-transparent', 'text-gray-700');
    this.classList.add('border-indigo-600', 'text-indigo-600');
  });
});
</script>


{{-- todo Para el boton de like --}}

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (localStorage.getItem('scrollPosition')) { // Verifica si existe un valor almacenado en localStorage con la clave 'scrollPosition'
    window.scrollTo(0, localStorage.getItem('scrollPosition')); // Si existe, mueve la ventana al valor de posicion de desplazamiento almacenado.
    localStorage.removeItem('scrollPosition'); // Limpia la posición despues de usarla
  }
    //? Encuentra el elemento dentro del DOM que tiene la clase 'heart-icon' dentro de un elemento con clase 'like-button'.
  const heartIcon = document.querySelector(".like-button .heart-icon");
  
  heartIcon.addEventListener("click", function() { //? Agrego un evento 'click' al icono del corazon
    this.classList.toggle("liked"); //? Alterna la clase 'liked' en el elemento cuando se hace clic. Si la clase está, la quita; si no está, la añade.

    
    // Guarda la posicion actual de desplazamiento de la ventana en localStorage con la clave 'scrollPosition'.
    localStorage.setItem('scrollPosition', window.scrollY);
  });
});
</script>


<style>
.heart-icon {
  background-image: url('/storage/heart.png');
  background-position: left center; /* Ajustar si es una imagen de sprite */
  background-repeat: no-repeat;
  background-size: cover;
  width: 100px; 
}

.heart-icon.liked {
  animation: like-anim 0.7s steps(28) forwards;
}

@keyframes like-anim {
  to {
    background-position: right;
  }
}

/* Añade aquí cualquier otro estilo personalizado necesario */
</style>

{{-- todo Fin Para el boton de like --}}

<script>
document.addEventListener('DOMContentLoaded', function() {
  inicializarCarrusel();
});

function inicializarCarrusel() {
  let indicePaginas = 0;
  let cantidadDesplazamiento = calcularDesplazamiento();

  // Ajustar el carrusel al tamaño inicial de la ventana
  ajustarCarrusel(indicePaginas, cantidadDesplazamiento);

  //? Aseguro que el carrusel se ajuste cuando se cambia el tamaño de la ventana
  window.addEventListener('resize', () => {
      cantidadDesplazamiento = calcularDesplazamiento();
      ajustarCarrusel(indicePaginas, cantidadDesplazamiento);
  });

  //? Funcion para desplazar el carrusel dada la dirección (-1 para izquierda, 1 para derecha)
  window.desplazarCarrusel = function(direccion) {
      const carouselInterior = document.getElementById('carouselInterior');
      const totalImagenes = carouselInterior.children.length; //? Numero total de contenedores de imagen
      
      // Actualizamos el indice de la pagina actual
      indicePaginas += direccion;
      // Prevenimos que el indice sea menor que 0 o mayor que el nukmero de paginas posible
      indicePaginas = Math.max(0, Math.min(indicePaginas, Math.ceil(totalImagenes / obtenerImagenesPorPantalla()) - 1));
      
      // Desplazamos el carrusel
      ajustarCarrusel(indicePaginas, cantidadDesplazamiento);
  }
}

function calcularDesplazamiento() {
  const imagenEjemplo = document.querySelector('#carouselInterior > div');
  // Obtenemos el ancho de un elemento de imagen incluyendo su margen derecho
  const imagenAncho = imagenEjemplo.offsetWidth + parseFloat(window.getComputedStyle(imagenEjemplo).marginRight);
  // Calculamos la cantidad de desplazamiento basándonos en la cantidad de imagenes por página
  return imagenAncho * obtenerImagenesPorPantalla();
}

function obtenerImagenesPorPantalla() {
  // Siempre muestra 4 imagenes independientemente del ancho de la pantalla
  return 4;
}


function ajustarCarrusel(indicePaginas, cantidadDesplazamiento) {
  const carouselInterior = document.getElementById('carouselInterior');
  // Calculamos la nueva posicion de desplazamiento
  const offset = indicePaginas * cantidadDesplazamiento;
  // Aplicamos la transformacion al carrusel
  carouselInterior.style.transform = `translateX(-${offset}px)`;
}

</script>

{{-- ? Para las estrellas --}}

<script>
document.addEventListener('DOMContentLoaded', () => {
  
  //? Seleccionamos todos los elementos de input cuyo id comience con "puntuacion-" y los almacenamos en la variable 'puntuaciones'.
  const puntuaciones = document.querySelectorAll('[id^="puntuacion-"]');

  //? Iteramos sobre cada elemento input que hemos recodigo anteriormente anteriormente.
  puntuaciones.forEach(input => {

    //? Convertimos el valor del input (que es una cadena de texto) a un numero entero y lo almacenamos en 'cantidadEstrellas'.
    const cantidadEstrellas = parseInt(input.value, 10); //! 10 es la base numerica.
    
    // Extraemos el identificador unico de la reseña del id del input, asumiendo que el id tiene el formato "puntuacion-X" donde X es el identificador.
    const reseñaId = input.id.split('-')[1];

    console.log(reseñaId);
    
    // Iteramos 5 veces, correspondiente a las 5 estrellas que puede tener cada reseña.
    for (let i = 1; i <= 5; i++) {
      
      //? Obtenemos cada estrella individualmente utilizando su id, que se construye con el identificador de la reseña y el numero de estrella en el bucle.
      const estrella = document.getElementById(`star-${reseñaId}-${i}`);

      //console.log(estrella);
      
      // Si encontramos una estrella (es decir, el elemento existe en el DOM), procedemos a actualizar su clase.
      if (estrella) {
        // 'toggle' añade o elimina la clase 'fas' (estrella rellena) si 'i' es menor o igual que 'cantidadEstrellas'.
        estrella.classList.toggle('fas', i <= cantidadEstrellas);
        // 'toggle' añade o elimina la clase 'far' (estrella vacia) si 'i' es mayor que 'cantidadEstrellas'.
        estrella.classList.toggle('far', i > cantidadEstrellas);
      }
    }
  });
});
</script>

{{-- ? Para los botones de leer mas o menos de la reseña --}}
<script>
  document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('.read-more-btn').forEach(button => {
          button.addEventListener('click', () => {
              const id = button.getAttribute('data-review-id');
              const isExpanded = button.getAttribute('data-expanded') === 'true';
  
              // Obtener los párrafos de reseña, pros y contras
              const reviewText = document.getElementById(`review-text-${id}`);
              const prosText = document.getElementById(`pros-text-${id}`);
              const contrasText = document.getElementById(`contras-text-${id}`);
  
              // Clase para line-clamp en TailwindCSS
              const lineClampClass = 'line-clamp-3';
  
              // Alternar la clase line-clamp y el estado del botón
              [reviewText, prosText, contrasText].forEach(el => {
                  if (el) {
                      el.classList.toggle(lineClampClass, isExpanded);
                  }
              });
              
              button.setAttribute('data-expanded', `${!isExpanded}`);
              button.textContent = isExpanded ? 'Leer más' : 'Leer menos'; // Cambiar el texto del botón
          });
      });
  });
  </script>
</x-app-layout>