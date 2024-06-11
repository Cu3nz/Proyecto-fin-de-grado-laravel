<div>
    <div onclick="toggleDrawerMobile(event)" class="cursor-pointer hover:bg-gray-200 py-3 px-3 w-full text-center rounded-lg flex items-center justify-center" aria-labelledby="offcanvasMobile">
        <i class="fas fa-shopping-cart text-xl"></i>
        <span class="ml-2">Mi cesta</span>
        <span class="ml-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full flex items-center justify-center">
          {{ $productosEnCarrito->sum('cantidad') }}
        </span>
      </div>
      
     <div id="offcanvasMobile" class="fixed top-0 right-0 transform translate-x-full z-40 h-screen p-4 overflow-y-auto bg-white w-full dark:bg-white transition-transform duration-300 ease-out" tabindex="-1">
        <h5 class="inline-flex items-center mb-4 text-md  font-bold text-black dark:text-black">
            Mi Cesta
        </h5>
        <button onclick="toggleDrawerMobile(event)" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <span class="sr-only">Close menu</span>
            <i class="fas fa-times"></i>
        </button>
        <div>
            @foreach ($productosEnCarrito -> reverse() as $item)
            <div class="flex items-center border border-gray-200 p-4 my-3 rounded-md" role="listitem" aria-label="Carrito de compras, producto">
                <div class="h-16 w-16 bg-gray-200 rounded-full flex-shrink-0">
                    <img src="{{ asset($item->imagen_producto) }}" alt="Imagen del producto {{ $item->nombre_producto }}" class="h-16 w-16 object-cover" aria-labelledby="producto-nombre-{{ $item->id }}">
                </div>
                <div class="ml-4 flex-grow">
                    <a href="{{route('overviewProduct' , $item -> product_id)}}">
                        <p id="producto-nombre-{{ $item->id }}" class="text-md max-w-40 hover_violeta ease-in duration-200 truncate font-semibold">{{ $item->nombre_producto }}</p>
                    </a>
                    <p class="text-md font-bold">{{ number_format($item->precio_unitario, 2) }}€</p>
                    <p class="text-md">Unidades: <span class="font-semibold">{{ $item->cantidad }}</span></p>
                </div>
                 <button wire:click="removeProduct({{ $item->id }})" class="text-red-500 mr-7 mb-10 delete-button" aria-label="Eliminar {{ $item->nombre_producto }}">
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
 
                 @if(count($productosEnCarrito))
                 <div class="text-black mt-5">
                    <p>Subtotal Sin IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€</p>
                    <p>IVA (21%): {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€</p>
                    <p>Total con IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 1.21; }), 2) }}€</p>
                </div>
                <div class=" mt-2 flex justify-center">
                    <a href="{{route('preCompra' , auth() -> user() -> id)}}" class="w-80 rosa transition duration-200 ease-in text-center py-2 rounded-md text-white">Ver artículos en tu cesta</a>
                 </div>
                 <div class="flex justify-center">
                    <button wire:click="confirmarVaciarCarritoMovil({{auth() -> user() -> id}})" class="mt-4 w-80 violeta text-white px-4 py-2 rounded-md">Vaciar Carrito</button>
                </div>
                 @endif
        </div>
     </div>
</div>



 <script>
        // Este script maneja el off-canvas del carrito de compras para móviles
        function toggleDrawerMobile(event) {
        event.stopPropagation(); // Evita que el evento se propague
        const drawerMobile = document.getElementById('offcanvasMobile');
        drawerMobile.classList.toggle('translate-x-full');
    }
    
    
    // Asegura que el evento de clic en el botón del off-canvas no se propague
    document.getElementById('offcanvasMobile').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    
    // Añade un evento de clic al documento para cerrar el off-canvas si se hace clic fuera de él
    document.addEventListener('click', function(event) {
        const drawerMobile = document.getElementById('offcanvasMobile');
        if (!drawerMobile.contains(event.target) && !drawerMobile.classList.contains('translate-x-full')) {
                closeDrawer();
            }
    });
    
    
        </script>
