<x-app-layout>
    {{-- ! plantilla buena --}} 
    <main>
      <header class="relative">
        <div aria-hidden="true" class="absolute inset-0 hidden sm:flex sm:flex-col">
          <div class="relative w-full flex-1 bg-gray-800">
            <div class="absolute inset-0 overflow-hidden">
                {{-- ? Imagen para el ordenador --}}
              <img src="{{Storage::url('1.webp')}}" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
          </div>
          <div class="h-32 w-full bg-white md:h-40 lg:h-48"></div>
        </div>
        
        <div class="relative mx-auto max-w-4xl px-4 pb-96 text-center sm:px-6 sm:pb-0 lg:px-8">
          <!-- Background image and overlap -->
          <div aria-hidden="true" class="absolute inset-0 flex flex-col sm:hidden">
            <div class="relative w-full flex-1 bg-gray-800">
              <div class="absolute inset-0 overflow-hidden">
                {{-- ? Imagen para  reponsive  movil --}}
                <img src="{{Storage::url('1.webp')}}" alt="" class="h-full w-full object-cover object-center">
              </div>
              <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
            </div>
            <div class="h-48 w-full bg-white"></div>
          </div>
          <div class="relative py-32">
            <h1 class="text-5xl font-bold tracking-tight uppercase text-white sm:text-6xl md:text-6xl">Muñecos Artesanales de Lana y Ganchillo</h1>
            <div class="text-center text-xl mt-4 max-w-40 md:max-w-full max-h-20">
                <span class="typing-text text-white w-full" id="typing-text"></span>
              </div>
            {{-- <div class="mt-4 sm:mt-6">
              <a href="#" class="inline-block rounded-md border border-transparent bg-indigo-600 px-8 py-3 font-medium text-white hover:bg-indigo-700">Shop Collection</a>
            </div> --}}
          </div>
        </div>
        
        {{-- todo Header imagenes --}}
        <section class="relative z-10 -mt-96 sm:mt-0">
          <h2 id="collection-heading" class="sr-only">Ultimas novedades</h2>
          <div class="mx-auto grid max-w-md grid-cols-1 gap-y-6 px-4 sm:max-w-7xl sm:grid-cols-3 sm:gap-x-6 sm:gap-y-0 sm:px-6 lg:gap-x-8 lg:px-8">
            @foreach ($categorias as $item)
            <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
              <div class="relative h-full w-full overflow-hidden group-hover:opacity-75 rounded-lg">
                <img src="{{Storage::url($item -> image -> url_imagen)}}" alt="{{$item -> nombre}}" class="h-96 w-full object-cover object-center">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                <div class="absolute inset-0 flex items-end p-6">
                  <div>
                    <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                    <h3 class="mt-1 font-semibold text-white">
                      <a href="{{route('category.subcategorias' , $item -> id)}}">
                        <span class="absolute inset-0"></span>
                        {{$item -> nombre}}
                      </a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            
            {{-- <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
                <div class="relative h-full w-full overflow-hidden group-hover:opacity-75 rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-02.jpg" alt="Man wearing a comfortable and casual cotton t-shirt." class="h-full w-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                    <div class="absolute inset-0 flex items-end p-6">
                        <div>
                            <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                            <h3 class="mt-1 font-semibold text-white">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Men's
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative h-96 rounded-lg bg-white shadow-xl sm:aspect-h-5 sm:aspect-w-4 sm:h-auto">
                <div class="relative h-full w-full overflow-hidden group-hover:opacity-75 rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/home-page-04-collection-03.jpg" alt="Person sitting at a wooden desk with paper note organizer, pencil and tablet." class="h-full w-full object-cover object-center">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-50"></div>
                    <div class="absolute inset-0  flex items-end p-6">
                        <div>
                            <p aria-hidden="true" class="text-sm text-white">Shop the collection</p>
                            <h3 class="mt-1 font-semibold text-white">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    Desk Accessories
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        </section>
        {{-- todo Fin seccion imagenes --}}
      </header>
  
      {{-- ? Primer producto --}}
      {{-- todo Ordenador --}}
      <section class="bg-white" aria-labelledby="trending-heading">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8 lg:pt-32">
          <div class="md:flex md:items-center md:justify-between">
            <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900">{{$KimetsuNoYaiba -> first() -> category -> nombre}}</h2>
            <a href="{{ route('productosConSubcategoria', $KimetsuNoYaiba->first()->category_id) }}" aria-label="Ver mas productos de {{$KimetsuNoYaiba -> first() -> category -> nombre}}" class=" hidden text-md  text_rosa ease-in duration-200 font-bold md:block">
              Ver más productos de {{$KimetsuNoYaiba -> first() -> category -> nombre}} ({{count($KimetsuNoYaiba)}})
              <span aria-hidden="true"> &rarr;</span>
          </a>
          </div>
  
          <div class="mt-6 grid grid-cols-2 gap-x-7 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
            @foreach ($KimetsuNoYaiba -> take(6) as $item)
            <div class="group mb-3  relative"> {{-- ? Separar cada linea de los productos entre la de arriba y abajo --}}
              <a href="{{route('overviewProduct' , $item -> id)}}">
              <div class="h-56 w-full  overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
                <img loading="lazy" src="{{Storage::url($item -> primeraImagen -> url_imagen)}}" alt="{{$item -> primeraImagen -> desc_imagen}}" title="{{$item -> primeraImagen -> desc_imagen}}" aria-label="{{$item -> primeraImagen -> desc_imagen}}" class="h-full w-full object-cover object-center">
              </div>
              </a>
              <h3 class="mt-4 text-xl text-gray-700">
                <a class="hover_rosa ease-in duration-150" href="{{route('overviewProduct' , $item -> id)}}">
                  {{$item -> nombre}}
                </a>
              </h3>
                <p class="mt-1 text-md text-gray-500">{{$item -> category -> nombre}}</p>
                <p @class([
                        "text-md font-bold",
                        "invisible" => $item->stock <= 0
                    ])>
                        Unidades listas para enviar
                        <span @class([
                            "text-red-600" => $item->stock >= 1 && $item->stock <= 5,
                            "text-orange-600" => $item->stock >= 6 && $item->stock <= 15,
                            "text-green-600" => $item->stock >= 16 && $item->stock <= 30
                        ])>
                            {{ $item->stock }}
                        </span>
                    </p>
                <p class="mt-1 text-xl font-bold text_rosa  text-gray-900">{{$item -> precio}}€</p>
            </div>
            
            @endforeach
          </div>

          {{-- todo Fin para ordenador --}}

          {{-- todo Para moviles --}}
          <section class="mt-8 text-sm md:hidden">
            <a href="{{route('productosConSubcategoria' , $KimetsuNoYaiba->first()->category_id)}}" aria-label="" class="font-bold text-md text_rosa">
              Ver mas productos de{{$KimetsuNoYaiba->first()->category->nombre}} ({{count($KimetsuNoYaiba)}})
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </section>
        </div>
      </section>
      {{-- todo fin para moviles --}}


      {{-- todo Segunda seccion Nuevos ordenador --}}
      <section class="bg-white" aria-label="Seccion de la categoria {{$nuevos -> first() -> category -> nombre}}">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8 lg:pt-32">
          <div class="md:flex md:items-center md:justify-between">
            <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900">{{$nuevos -> first() -> category -> nombre}}</h2>
            <a href="{{route('productosConSubcategoria' , $nuevos -> first() -> category_id )}}" aria-label="Ver mas productos de {{$nuevos -> first() -> category -> nombre}}" class="hidden text-md text_rosa font-bold md:block">
                Ver más productos {{$nuevos->first()->category->nombre}} ({{count($nuevos)}}) 
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </div>
  
          <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
            @foreach ($nuevos -> take(10) as $item)
            <div class="group relative">
                <a href="{{route('overviewProduct' , $item -> id)}}">
                    <div class="h-56 w-full  overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
                        <img loading="lazy" src="{{Storage::url($item -> primeraImagen -> url_imagen)}}" alt="{{$item -> primeraImagen -> desc_imagen}}" title="{{$item -> primeraImagen -> desc_imagen}}" aria-label="{{$item -> primeraImagen -> desc_imagen}}" class="h-full w-full object-cover object-center">
                    </div>
                    </a>
                    <h3 class="mt-4 text-xl text-black">
                        <a class="hover_rosa transition duration-200 ease-in" href="{{route('overviewProduct' , $item -> id)}}">
                          {{$item -> nombre}}
                        </a>
                      </h3>
                <p class="mt-1 text-md   text-black">{{$item -> category -> nombre}}</p>
                <p @class(["invisible" => $item -> stock <= 0])>Unidades listas para enviar <span class="text-green-600">{{$item -> stock}}</span></p>
                <p class="mt-1 text-xl text_rosa font-bold text-gray-900">{{$item -> precio}}€</p>
            </div>
            @endforeach
          </div>

          {{-- todo fin ordenador --}}
  
          {{-- todo Comiezo movil --}}
          <div class="mt-8 text-sm md:hidden">
            <a href="{{route('productosConSubcategoria' , $nuevos -> first() -> category_id )}}" class="font-bold text-md text_rosa">
              Ver más  {{$nuevos->first()->category->nombre}} ({{count($nuevos)}})
              <span aria-hidden="true"> &rarr;</span>
              </a>
              </div>
              </div>
              </section>

            {{-- todo Fin Comiezo movil --}}



      <div class="bg-white">
        <div class="flex flex-col border-b border-gray-200 lg:border-0">
          <nav aria-label="Offers" class="order-last lg:order-first">
            <div class="mx-auto max-w-7xl lg:px-8">
                <ul role="list" class="grid grid-cols-1 divide-y divide-gray-200 lg:grid-cols-3 lg:divide-x lg:divide-y-0">
                    <li class="flex flex-col">
                      <a href="#" class="relative flex flex-1 flex-col justify-center bg-white px-4 py-6 text-center focus:z-10">
                        <p class="text-sm text-gray-500">Compra ahora y recibe rápido</p>
                        <p class="font-semibold text-gray-900">Envíos en 24-48 horas</p>
                      </a>
                    </li>
                    <li class="flex flex-col">
                      <a href="#" class="relative flex flex-1 flex-col justify-center bg-white px-4 py-6 text-center focus:z-10">
                        <p class="text-sm text-gray-500">Disfruta de productos únicos</p>
                        <p class="font-semibold text-gray-900">Hechos a mano con amor</p>
                      </a>
                    </li>
                    <li class="flex flex-col">
                      <a href="#" class="relative flex flex-1 flex-col justify-center bg-white px-4 py-6 text-center focus:z-10">
                        <p class="text-sm text-gray-500">Garantía de satisfacción</p>
                        <p class="font-semibold text-gray-900">Devoluciones gratuitas en 30 días</p>
                      </a>
                    </li>
                  </ul>
            </div>
          </nav>
      
          <div class="relative">
            <div aria-hidden="true" class="absolute hidden h-full w-1/2 bg-gray-100 lg:block"></div>
            <div class="relative bg-gray-100 lg:bg-transparent">
              <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:grid lg:grid-cols-2 lg:px-8">
                <div class="mx-auto max-w-2xl py-24 lg:max-w-none lg:py-64">
                  <div class="lg:pr-16">
                    <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl xl:text-6xl">Listos para enviar</h2>
                    <p class="mt-4 text-xl text-gray-600">¿Buscas productos que puedas tener en tus manos rápidamente? Explora nuestra selección de artículos en stock, disponibles para envío inmediato. ¡Compra ahora y disfruta de una entrega rápida y eficiente!</p>
                    <div class="mt-6">
                      <a href="{{route('productosEnStock')}}" class="inline-block rounded-md border border-transparent rosa px-8 py-3 font-medium text-white ease-in duration-200 ">Ver Productos</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="h-48 w-full sm:h-64 lg:absolute lg:right-0 lg:top-0 lg:h-full lg:w-1/2">
              <img src="{{Storage::url('1.webp')}}" alt="" class="h-full w-full object-cover object-center">
            </div>
          </div>
        </div>
      </div>

      
{{-- todo tercer producto ordenador --}}
      <section class="bg-white" aria-labelledby="trending-heading">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8 lg:pt-32">
          <div class="md:flex md:items-center md:justify-between">
            <h2 id="favorites-heading" class="text-2xl font-bold tracking-tight text-gray-900">{{$ShingekinoKyojin -> first() -> category -> nombre}}</h2>
            <a href="{{route('productosConSubcategoria' , $ShingekinoKyojin -> first() -> category_id )}}" class="hidden text-md text_rosa font-bold ease-in duration-200  md:block">
                Ver mas productos de  {{$ShingekinoKyojin->first()->category->nombre}} ({{count($ShingekinoKyojin)}})
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </div>
  
          <div class="mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
            @foreach ($ShingekinoKyojin -> take(10) as $item)
            <div class="group mt-5 relative">
                <a href="{{route('overviewProduct' , $item -> id)}}">
                    <div class="h-56 w-full  overflow-hidden rounded-md group-hover:opacity-75 lg:h-72 xl:h-80">
                        <img loading="lazy" src="{{Storage::url($item -> primeraImagen -> url_imagen)}}" alt="{{$item -> primeraImagen -> desc_imagen}}" title="{{$item -> primeraImagen -> desc_imagen}}" aria-label="{{$item -> primeraImagen -> desc_imagen}}" class="h-full w-full object-cover object-center">
                    </div>
                    </a>
                    <h3 class="mt-4 text-xl text-gray-700">
                        <a class="hover_rosa transition duration-200 ease-in" href="{{route('overviewProduct' , $item -> id)}}">
                          {{$item -> nombre}}
                        </a>
                      </h3>
                <p class="mt-1 text-md text-black">{{$item -> category -> nombre}}</p>
                <p @class(["font-bold",
                "invisible" => $item -> stock <= 0])>Unidades listas para enviar <span class="text-green-600">{{$item -> stock}}</span></p>
                <p class="mt-1 text-xl font-bold text_rosa">{{$item -> precio}}€</p>
            </div>
            @endforeach
          </div>

          {{-- todo Fin de ordenador --}}
  
          <div class="mt-8 text-sm md:hidden">
            <a href="{{route('productosConSubcategoria' , $ShingekinoKyojin -> first() -> category_id )}}" class="font-bold text-md text_rosa transition duration-200 ease-in">
                Ver mas de {{$ShingekinoKyojin->first()->category->nombre}} ({{count($ShingekinoKyojin)}})
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </div>
        </div>
      </section>
      
      
  
      
  
      <section class="bg-white" aria-labelledby="perks-heading" class="border-t border-gray-200 bg-gray-50">
        <h2 id="perks-heading" class="sr-only">Nuestras Ventajas</h2>
  
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
          <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-0">
            <article class="text-center md:flex md:items-start md:text-left lg:block lg:text-center" aria-labelledby="devoluciones-gratuitas-heading" role="region">
                <div class="md:flex-shrink-0" role="img" aria-label="Icono de devoluciones gratuitas">
                  <div class="flow-root">
                    <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg" alt="Icono de devoluciones gratuitas">
                  </div>
                </div>
                <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                  <h3 id="devoluciones-gratuitas-heading" class="text-base font-bold text-gray-900">Devoluciones gratuitas</h3>
                  <p class="mt-3 text-sm font-bold text-gray-500">¿No era lo que esperabas? Vuelve a colocarlo en el paquete y adjunta la etiqueta de envío prepagada.</p>
                </div>
              </article>

            <article class="text-center md:flex md:items-start md:text-left lg:block lg:text-center" aria-labelledby="entrega-rapida-heading" role="region">
                <div class="md:flex-shrink-0" role="img" aria-label="Icono de un calendario para definir una entrega rápida">
                    <div class="flow-root">
                    <img class="-my-1 mx-auto font-bold h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg" alt="Icono de entrega rápida">
                    </div>
                </div>
                <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                    <h3 id="entrega-rapida-heading" class="text-base font-bold text-gray-900">Entrega rápida</h3>
                    <p class="mt-3 text-sm font-bold text-gray-500">Realiza tu pedido hoy y recibe tus productos únicos en la puerta de tu casa en un plazo máximo de 2 semanas. ¡La espera valdrá la pena!</p>
                </div>
            </article>

            <article class="text-center md:flex md:items-start md:text-left lg:block lg:text-center" aria-labelledby="productos-unicos-heading" role="region">
                <div class="md:flex-shrink-0" role="img" aria-label="Icono de productos únicos">
                  <div class="flow-root">
                    <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="Icono de productos únicos">
                  </div>
                </div>
                <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                  <h3 id="productos-unicos-heading" class="text-base font-bold text-gray-900">Productos únicos y hechos a mano</h3>
                  <p class="mt-3 text-sm font-bold text-gray-500">Cada uno de nuestros productos está hecho a mano con atención y dedicación, asegurando que recibas algo verdaderamente especial y único. ¡Explora nuestra colección y encuentra algo perfecto para ti!</p>
                </div>
            </article>
              
            
            <article class="text-center md:flex md:items-start md:text-left lg:block lg:text-center" aria-labelledby="compromiso-medioambiente-heading" role="region">
                <div class="md:flex-shrink-0" role="img" aria-label="Icono de compromiso con el medio ambiente">
                  <div class="flow-root">
                    <img class="-my-1 mx-auto h-24 w-auto" src="https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg" alt="Icono de compromiso con el medio ambiente">
                  </div>
                </div>
                <div class="mt-6 md:ml-4 md:mt-0 lg:ml-0 lg:mt-6">
                  <h3 id="compromiso-medioambiente-heading" class="text-base font-bold text-gray-900">Comprometidos con el medio ambiente</h3>
                  <p class="mt-3 text-sm font-bold text-gray-500">Nuestros productos están hechos con materiales reciclados y sostenibles, combinando belleza y respeto por el planeta. Al elegirnos, apoyas prácticas ecológicas y un futuro más verde. ¡Compra hoy y sé parte del cambio!</p>
                </div>
              </article>
              
              
          </div>
        </div>
      </section>
    </main>
  </div>
  </x-app-layout>