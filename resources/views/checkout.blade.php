
<x-app-layout>
    <div class="container mx-auto py-10">
        <h1 class="text-center text-3xl font-bold mb-10">Datos del Usuario</h1>
        <div class="flex flex-col md:flex-row bg-white p-6 rounded-lg shadow-lg">
            <div class="w-full md:w-1/2 pr-4">
                <h2 class="text-2xl font-bold mb-6">Resumen del Pedido</h2>
                @foreach ($productosEnCarrito -> reverse() as $producto)
                    <div class="flex mb-4 border-b pb-4">
                        <img src="{{ asset($producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}" class="w-20 h-20 object-cover rounded mr-4">
                        <div>
                            <h5 class="text-xl font-semibold">{{ $producto->nombre_producto }}</h5>
                            <p class="text-gray-700">{{ $producto->cantidad }} x €{{ number_format($producto->precio_unitario, 2) }}</p>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Subtotal: €{{ number_format($productosEnCarrito->sum(fn($item) => $item->precio_unitario * $item->cantidad), 2) }}</h3>
                    <h3 class="text-lg font-semibold">IVA (21%): €{{ number_format($productosEnCarrito->sum(fn($item) => $item->precio_unitario * $item->cantidad * 0.21), 2) }}</h3>
                    <h3 class="text-lg font-semibold">Total: €{{ number_format($productosEnCarrito->sum(fn($item) => $item->precio_unitario * $item->cantidad * 1.21), 2) }}</h3>
                </div>
            </div>
            <div class="w-full md:w-1/2">
                <form action="{{ route('session') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="first_name" name="first_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                        <input type="text" id="last_name" name="last_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input type="text" id="address" name="address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                        <input type="text" id="city" name="city" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="postal_code" class="block text-sm font-medium text-gray-700">Código Postal</label>
                        <input type="text" id="postal_code" name="postal_code" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                        <input type="text" id="country" name="country" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="w-full  text-white py-2 px-4 rounded-md shadow-sm rosa ease-in duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ir a Pagar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </x-app-layout>