


{{-- hola 22 de mayo --}}
<div class="py-5">
    @if (session()->has('error'))
    <div id="session-message" class="bg-red-500 text-center text-white font-bold p-2 rounded mb-4 opacity-100 transition-opacity duration-500">
        {{ session('error') }}
    </div>
@endif

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sessionMessage = document.getElementById('session-message');
        if (sessionMessage) {
            // Ensure the message starts visible
            setTimeout(() => {
                sessionMessage.classList.remove('opacity-0');
                sessionMessage.classList.add('opacity-100');
            }, 100); // Small delay for smooth appearance

            // Fade out the message after 3 seconds
            setTimeout(() => {
                sessionMessage.classList.add('opacity-0');
                sessionMessage.classList.remove('opacity-100');
            }, 3100); // 3 seconds delay before starting to fade out

            // Add hidden class after the fade-out transition
            setTimeout(() => {
                sessionMessage.classList.add('hidden');
            }, 3600); // 500ms after starting the fade out
        }
    });
</script> --}}


    <div class="container mx-auto p-2">
        <section aria-labelledby="cart-heading">
            <h2 id="cart-heading" class="text-2xl font-bold mb-2">Mi cesta</h2>
            <p class="text-black italic font-bold mb-4">{{$productosEnCarrito -> sum('cantidad')}} artículos</p>
            <div class="flex flex-col md:flex-row md:space-x-4">
                <!-- Carrito -->
                <div class="w-full md:w-3/4 space-y-4">
                    @if(count($productosEnCarrito) > 0)
                    @foreach ($productosEnCarrito -> reverse() as $producto)
                    <article class="border p-4  rounded mb-4" aria-labelledby="{{$producto -> nombre_producto}}">
                        <div class="flex items-center flex-wrap">
                            <img src="{{ asset($producto->imagen_producto) }}" alt="Imagen del producto {{ $producto->nombre_producto }}"
                            class="w-24 h-24 object-cover rounded mr-4">
                            <div class="flex-1">
                                <div class="flex  justify-between items-center flex-wrap">
                                    <a class="hover:text-purple-300-600 ease-in-out transition-colors duration-300" href="{{route('overviewProduct' , $producto -> product_id)}}">
                                        <h3 class="text-lg truncate font-semibold max-w-44 md:max-w-44 lg:max-w-96 hover_rosa transition duration-200 ease-in w-full md:w-auto">{{$producto -> nombre_producto}}</h3>
                                    </a>
                                    <!-- Botones de subir y bajar stock -->
                                    <div class="flex items-center space-x-2 mt-2 md:mt-0">
                                        <div class="relative flex items-center max-w-[8rem]">
                                            <div class="relative flex items-center max-w-[8rem] border border-gray-300 rounded-lg">
                                                {{-- todo Boton que disminuye el stock --}}
                                                <button wire:click="disminuirStock({{$producto -> id}})" type="button" data-input-counter-decrement="quantity-input-{{ $producto->id }}"
                                                    @class([
                                                        ' hover:bg-gray-200 border-r  rounded-s-lg p-3 h-11 focus:ring-0 focus:outline-none text-black',
                                                        'cursor-not-allowed opacity-30 font-bold' => $producto->cantidad == 1,
                                                        'bg-white' => $producto->cantidad > 1
                                                    ])
                                                    aria-label="Disminuir cantidad del producto {{ $producto->nombre_producto }}"
                                                    {{ $producto->cantidad == 1 ? 'disabled' : '' }}>
                                                    <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                    </svg>
                                                </button>
                                                
                                                {{-- todo Input --}}
                                                <input type="text" readonly id="cantidad-input-{{ $producto->id }}" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="cantidad" aria-label="Cantidad del producto {{$producto -> nombre_producto}}" class="bg-white border-x-0 border-white h-11 text-center text-black text-lg font-bold block w-full py-2.5 focus:outline-none focus:ring-0 focus:border-transparent" value="{{$producto ->cantidad}}" />
                                                
                                                {{-- todo Boton de aumentar --}}
                                                <button wire:click="aumentarStock({{$producto -> id}})" type="button" id="increment-button-{{ $producto->id }}" data-input-counter-increment="quantity-input-{{ $producto->id }}" class="bg-white hover:bg-gray-200 border-l border-gray-300 rounded-e-lg p-3 h-11 focus:ring-0 focus:outline-none text-black" aria-label="Aumentar cantidad del producto {{$producto ->nombre_producto}}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            
                                        </div>
                                        {{-- ? Boton para eliminar un producto en concreto --}}
                                        {{-- ! Le paso el id del Registro, no la id del producto --}}
                                        {{-- <form action="{{route('removeProductCarrito' , $producto -> id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="flex items-center text-white px-2 py-1 rounded" aria-label="Eliminar producto {{$producto -> nombre_producto}}">
                                                <lord-icon src="https://cdn.lordicon.com/drxwpfop.json" trigger="morph" state="morph-trash-in" colors="primary:#e83a30,secondary:#e83a30" style="width:40px;height:50px"></lord-icon>
                                            </button>
                                        </form> --}}
                                        {{-- ! Cambiar por esto, para que solo se actualice el carrito y no se actualice la pagina entera --}}
                                        <button wire:click="removeProduct({{ $producto->id }})" class="text-red-500 flex items-center mt-9 mr-7 mb-10 delete-button">
                                            <lord-icon
                                                src="https://cdn.lordicon.com/drxwpfop.json"
                                                trigger="morph"
                                                state="morph-trash-in"
                                                colors="primary:#c71f16,secondary:#e83a30"
                                                style="width:40px;height:50px">
                                            </lord-icon>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="text-black text-xl font-bold">{{$producto -> precio_unitario}}€</span>
                                </div>
                                <p class="text-green-500 mt-2">Recíbelo el lunes 20 de mayo</p>
                            </div>
                        </div>
                    </article>
                    @endforeach
                  
                    
                    <!-- Producto 2 -->
                    {{-- <article class="border p-4 rounded mb-4" aria-labelledby="producto-2">
                        <div class="flex items-center flex-wrap">
                            <img src="https://via.placeholder.com/100" alt="Imagen de Samsung Galaxy Watch6 Bluetooth 40mm Grafito"
                                class="w-24 h-24 object-cover rounded mr-4">
                            <div class="flex-1">
                                <div class="flex justify-between items-center flex-wrap">
                                    <h3 id="producto-2" class="text-lg font-semibold max-w-xs md:max-w-none w-full md:w-auto">Samsung Galaxy Watch6 Bluetooth 40mm Grafito</h3>
                                    <div class="flex items-center space-x-2 mt-2 md:mt-0">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Disminuir cantidad del producto Samsung Galaxy Watch6">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" class="w-12 text-center border rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Cantidad del producto Samsung Galaxy Watch6">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Aumentar cantidad del producto Samsung Galaxy Watch6">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Eliminar producto Samsung Galaxy Watch6">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="text-purple-500 text-xl font-bold">199€</span>
                                </div>
                                <p class="text-green-500 mt-2">Recíbelo el lunes 20 de mayo</p>
                            </div>
                        </div>
                    </article> --}}

                    <!-- Producto 3 -->
                    {{-- <article class="border p-4 rounded mb-4" aria-labelledby="producto-3">
                        <div class="flex items-center flex-wrap">
                            <img src="https://via.placeholder.com/100" alt="Imagen de Balay 3CG5172N2 Microondas Integrable con Grill 20L 800W Cristal Negro"
                                class="w-24 h-24 object-cover rounded mr-4">
                            <div class="flex-1">
                                <div class="flex justify-between items-center flex-wrap">
                                    <h3 id="producto-3" class="text-lg font-semibold max-w-xs md:max-w-none w-full md:w-auto">Balay 3CG5172N2 Microondas Integrable con Grill 20L 800W Cristal Negro</h3>
                                    <div class="flex items-center space-x-2 mt-2 md:mt-0">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Disminuir cantidad del producto Balay Microondas">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" class="w-12 text-center border rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Cantidad del producto Balay Microondas">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Aumentar cantidad del producto Balay Microondas">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Eliminar producto Balay Microondas">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="text-purple-500 text-xl font-bold">219€</span>
                                </div>
                                <p class="text-green-500 mt-2">Recíbelo el lunes 20 de mayo</p>
                            </div>
                        </div>
                    </article> --}}

                    <!-- Producto 4 (ejemplo adicional) -->
                   {{--  <article class="border p-4 rounded mb-4" aria-labelledby="producto-4">
                        <div class="flex items-center flex-wrap">
                            <img src="https://via.placeholder.com/100" alt="Imagen de Balay 3CG5172N2 Microondas Integrable con Grill 20L 800W Cristal Negro"
                                class="w-24 h-24 object-cover rounded mr-4">
                            <div class="flex-1">
                                <div class="flex justify-between items-center flex-wrap">
                                    <h3 id="producto-4" class="text-lg font-semibold max-w-xs md:max-w-none w-full md:w-auto">Balay 3CG5172N2 Microondas Integrable con Grill 20L 800W Cristal Negro</h3>
                                    <div class="flex items-center space-x-2 mt-2 md:mt-0">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Disminuir cantidad del producto Balay Microondas">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input type="number" value="1" class="w-12 text-center border rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Cantidad del producto Balay Microondas">
                                        <button class="bg-gray-200 text-gray-600 px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Aumentar cantidad del producto Balay Microondas">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <button class="bg-red-500 text-white px-2 py-1 rounded focus:outline-none focus:ring-0 focus:border-transparent" aria-label="Eliminar producto Balay Microondas">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 mt-2">
                                    <span class="text-purple-500 text-xl font-bold">219€</span>
                                </div>
                                <p class="text-green-500 mt-2">Recíbelo el lunes 20 de mayo</p>
                            </div>
                        </div>
                    </article> --}}
                    
                    <!-- Botones de acción -->
                    <div class="flex flex-col items-center space-y-2 mt-4 md:flex-row md:space-y-3 md:justify-between">
                        {{-- <form class="w-full md:w-1/2" action="{{route('carrito.destroy')}}" method="post">
                            @csrf
                            <button class="bg-purple-500 text-white w-full h-11 md:w-30  lg:w-1/2  px-4 py-2 rounded flex items-center justify-center space-x-2" aria-label="Vaciar cesta">
                                <lord-icon src="https://cdn.lordicon.com/drxwpfop.json" trigger="morph" state="morph-trash-in" colors="primary:#e83a30,secondary:#e83a30" style="width:30px;height:40px"></lord-icon>
                                <span>Vaciar cesta</span>
                            </button>
                        </form> --}}
                        {{-- ! Cambiar por esto --}}
                        <button wire:click="confirmarVaciarCarritoPreCompra({{auth() -> user() -> id}})" class="mt-4 w-full violeta font-bold transition ease-in duration-150 text-white px-4 py-2 rounded-md md:max-w-44  lg:w-1/4">Vaciar Carrito</button>
                        <a href="{{route('dashboard')}}" class="rosa transition duration-200 ease-in text-white w-full md:max-w-52 px-4 py-2 rounded flex items-center justify-center space-x-2" aria-label="Seguir comprando">
                                <span>Seguir comprando</span>
                        </a>
                    </div>
                    @else
                    <div class="flex items-center mt-16 justify-center">
                        <h1>No hay productos acutalmente en el carrito</h1>
                    </div>

                    <div class="flex justify-center">
                        <a href="{{route('dashboard')}}" class="w-80 rosa transition duration-200 ease-in text-center py-2 rounded-md text-white">Seguir comprando</a>
                    </div>
                    
                    @endif
                </div>

                <!-- Resumen para pantallas grandes -->
                <aside class="hidden h-72  md:block w-full md:w-2/4 lg:w-1/4 py-2 bg-white p-4 rounded shadow-md mt-4 md:mt-0" aria-labelledby="Cabecera resumen">
                    <div class="flex flex-col h-full justify-between">
                        <div>
                            <h2 id="resumen-heading" class="text-2xl font-bold mb-4">Resumen</h2>
                            <p class="flex justify-between mb-2" aria-label="Subtotal artículos"><span>Subtotal artículos:</span> <span></span></p>

                            <p class="font-bold" aria-label="Subtotal Sin IVA {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€ ">Subtotal Sin IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€</p>

                            <p class="font-bold" aria-label="IVA (21%) {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€">IVA (21%): {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€</p>

                            <p class="flex justify-between font-bold text-md mb-4" aria-label="Total (Impuestos incluidos) {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 1.21; }), 2) }}€"><span>Total (Impuestos incluidos):</span> <span>{{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 1.21; }), 2) }}€</span></p>

                        </div>
                        <div>
                            <button class="w-full rosa transition duration-200 ease-in text-white px-4 py-2 rounded" aria-label="Realizar pedido">Realizar pedido</button>
                        </div>
                    </div>
                </aside>
                
                <!-- Resumen para pantallas móviles -->
                <aside class="w-full md:hidden bg-white p-4 rounded shadow-md mt-4 md:mt-0" aria-labelledby="Cabecera resumen movil">
                    <h2 id="resumen-heading-movil" class="text-2xl font-bold mb-4">Resumen</h2>
                    <p class="font-bold" aria-label="Subtotal Sin IVA {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€ ">Subtotal Sin IVA: {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad; }), 2) }}€</p>

                            <p class="font-bold" aria-label="IVA (21%) {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€">IVA (21%): {{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 0.21; }), 2) }}€</p>
                </aside>
                <aside class="w-full sticky bottom-0 md:hidden bg-white p-4 rounded shadow-md mt-4 md:mt-0" aria-labelledby="resumen-heading-movil">
                    <p class="flex justify-between font-bold text-md mb-4"><span>Total (Impuestos incluidos):</span>
                        <span>{{ number_format($productosEnCarrito->sum(function($item) { return $item->precio_unitario * $item->cantidad * 1.21; }), 2) }}€</span>
                    </p>
                    <button class="w-full rosa transition duration-200 ease-in text-white px-4 py-2 rounded" aria-label="Realizar pedido">Realizar pedido</button>
                </aside>
            </div>

        </section>
    </div>
    <footer class="text-sm text-center md: mt-5 px-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut minus magni architecto fugit! Aperiam vel expedita dignissimos molestiae! Repellendus, qui.
    </footer>
</div>






