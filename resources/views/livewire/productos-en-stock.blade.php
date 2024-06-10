<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    {{ Breadcrumbs::render('productosEnStock') }}
    <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-24">
        <h1 class="text-4xl font-bold tracking-tight text_rosa underline">Productos Disponibles</h1>
        <div class="flex items-center">
            <div class="relative inline-block text-left" x-data="{ open: false }">
                <div>
                    <button type="button" @click="open = !open" class="group  text-black hover:bg-gray-300 ease-in duration-200  px-2 py-3 inline-flex justify-center  text-md  font-bold">
                        Ordenar
                        <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white  ring-1 ring-black ring-opacity-5 focus:outline-none transition transform ease-out duration-200 scale-95">
                    <div class="py-1">
                        <button wire:click="$set('ordenar_por', 'precio_asc')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Precio: Menor a Mayor
                        </button>
                        <button wire:click="$set('ordenar_por', 'precio_desc')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Precio: Mayor a Menor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex lg:hidden p-4">
        <button id="menu-button" class="text-gray-900 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Filtros -->
        <aside id="categories-menu" class="hidden lg:block transition-all duration-300 ease-in-out">
            <h3 class="sr-only">Categorías</h3>
            <ul role="list" class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                <li>
                    <a href="#" wire:click.prevent="$set('categoria_id', null)" class="">Todos</a>
                </li>
                @foreach($categorias as $categoria)
                    <li>
                        @if($categoria->children->count())
                            <span>{{ $categoria->nombre }}</span>
                            <ul class="pl-4">
                                @foreach($categoria->children as $subcategoria)
                                    <li class="mt-2 text-md font-bold ">
                                        <a class="hover_rosa" href="#" wire:click.prevent="$set('categoria_id', {{ $subcategoria->id }})">{{ $subcategoria->nombre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a href="#" wire:click.prevent="$set('categoria_id', {{ $categoria->id }})">{{ $categoria->nombre }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </aside>

        {{-- todo grid de productos mejorar --}}
        <section class="lg:col-span-3 py-5" aria-labelledby="productos-disponibles">
            <h2 id="productos-disponibles" class="sr-only">Productos disponibles</h2>

            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                @forelse ($productos as $producto)
                <article class="bg-white rounded-lg overflow-hidden transform transition duration-500 ease-in-out hover:scale-105 flex flex-col">
                    <a href="{{ route('overviewProduct', $producto->id) }}" class="flex flex-col flex-grow">
                        <img src="{{ Storage::url($producto->primeraImagen->url_imagen) }}" alt="Imagen del producto {{ $producto->nombre }}" class="w-full h-48 object-cover">
                    </a>
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $producto->nombre }}</h3>
                            <p class="text-gray-500 overflow-y-auto max-h-36 flex-grow">{{ $producto->descripcion }}</p>
                            <div class="mt-auto">
                                <a href="{{route('productosConSubcategoria' , $producto -> category -> id)}}" class="mt-2  font-bold">{{ $producto->category->nombre }}</a>
                                <p class="mt-2 text_rosa text-md font-bold">{{ $producto->precio }}€</p>
                                <p class="mt-1 text-md text-black">Stock: 
                                    <span @class(["font-bold",
                                        'text_violeta' => $producto->stock >= 1 && $producto->stock <= 5,
                                        'text_violeta' => $producto->stock >= 6 && $producto->stock <= 15,
                                        'text_violeta' => $producto->stock >= 16 && $producto->stock <= 100,
                                        'text-gray-500' => $producto->stock < 1 || $producto->stock > 100,
                                    ])>
                                        {{ $producto->stock }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    
                </article>
                @empty
                    <p class="text-gray-500">No hay productos disponibles en stock.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $productos->links() }}
            </div>
        </section>
    </div>
</div>

<script>
    document.getElementById('menu-button').addEventListener('click', function() {
        var menu = document.getElementById('categories-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
            menu.classList.add('block');
            setTimeout(() => menu.classList.add('opacity-100', 'transform', 'translate-y-0'), 10);
        } else {
            menu.classList.add('hidden');
            menu.classList.remove('block', 'opacity-100', 'transform', 'translate-y-0');
        }
    });
</script>
