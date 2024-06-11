<div>
    <div onclick="toggleDrawer(event)" type="button" class="hover:bg-gray-200 py-3 px-3 w-auto rounded-lg cursor-pointer">
        <div class="relative inline-block text-center">
            <button class="relative ml-3 text-gray-700 font-medium focus:outline-none">
                <i class="fas fa-shopping-cart text-xl"></i>
                <div class="absolute top-0 -right-1 transform translate-x-1/4 -translate-y-1/4">
                    <span aria-label="En tu cesta hay {{$productosEnCarrito -> sum('cantidad')}}" class="inline-flex mb-7 items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                        {{ $productosEnCarrito->sum('cantidad') }}
                    </span>
                </div>
            </button>
            <span class="text-md ml-2">Mi cesta</span>
        </div> 
        <div id="drawer-right-example" class="fixed top-0 right-0 transform translate-x-full z-40 h-screen p-4 overflow-y-auto bg-white w-96  transition-transform duration-300 ease-out" tabindex="-1" aria-labelledby="drawer-right-label">
            <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-black">
                Lista de la compra
            </h5>
            <button onclick="toggleDrawer(event)" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <span class="sr-only">Close menu</span>
                <i class="fas fa-times"></i>
            </button>
            <div class="">
                @foreach ($productosEnCarrito -> reverse() as $item)
                <div class="flex items-center justify-between py-4">
                    <div class="flex items-center">
                        <a href="{{route('overviewProduct' , $item -> product_id)}}">
                            <img src="{{ asset($item->imagen_producto) }}" alt="{{ $item->nombre_producto }}" class="h-24 w-24 object-cover rounded mr-4">
                        </a>
                        <div class="text-black text-md">
                            <a class="hover_violeta ease-in-out transition-colors duration-300" href="{{route('overviewProduct' , $item -> product_id)}}">
                                <p class="text-md truncate md:max-w-44 font-semibold">{{ $item->nombre_producto }}</p>
                            </a>
                            <p class="text-md">{{ number_format($item->precio_unitario, 2) }}€</p>
                            <p class="text-md">Unidades: {{ $item->cantidad }}</p>
                        </div>
                    </div>
                    <button wire:click="removeProduct({{ $item->id }})" class="text-red-500 mr-7 mb-10 delete-button">
                        <lord-icon
                            src="https://cdn.lordicon.com/drxwpfop.json"
                            trigger="morph"
                            state="morph-trash-in"
                            colors="primary:#c71f16,secondary:#e83a30"
                            style="width:3vh;height:4vh">
                        </lord-icon>
                    </button>
                    
                </div>
                @endforeach
            </div>
            @if($productosEnCarrito->count() > 0)
            <div class="text-black mt-2">
                <p>Subtotal Sin IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€</p>
                <p>IVA (21%): {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€</p>
                <p>Total con IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 1.21; }), 2) }}€</p>
            </div>
            <div class="mt-2 flex justify-center">
                <a href="{{route('preCompra' , auth() -> user() -> id)}}" class="w-80 rosa transition duration-200 ease-in text-center py-2 rounded-md text-white">Ver artículos en tu cesta</a>
            </div>
            <div class="flex justify-center">
                    <button wire:click="confirmarVaciarCarrito({{auth() -> user() -> id}})" class="mt-4 w-80 violeta transition duration-200 ease-in  text-white px-4 py-2 rounded-md">Vaciar Carrito</button>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function toggleDrawer(event) {
        event.stopPropagation();
        const drawer = document.getElementById('drawer-right-example');
        drawer.classList.toggle('translate-x-full');
    }

    document.addEventListener('click', function(event) {
        const drawer = document.getElementById('drawer-right-example');
        if (!drawer.contains(event.target) && !drawer.classList.contains('translate-x-full')) {
            closeDrawer();
        }
    });

    function closeDrawer() {
        const drawer = document.getElementById('drawer-right-example');
        if (!drawer.classList.contains('translate-x-full')) {
            drawer.classList.add('translate-x-full');
        }
    }
</script>
