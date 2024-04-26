<div>
    {{-- ? estoy a 16 de abril hacer para mañana  --}}
    {{-- ? Miga de pan 14  --}}
    {{ Breadcrumbs::render('visualizar_favoritos') }}
    <x-propio>
        <div class="flex w-full mb-1 justify-center">
                <div class="flex-1 ">
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-3/4"
                        placeholder="Busca un articulo" wire:model.live="buscar">
                </div>
        </div>
        <div class="flex justify-center mt-6">
            <div class="w-full max-w-4xl px-6 py-4">
                <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Mis Productos Favoritos</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($misLikes as $like)
                        <div class="block transform transition duration-300 ease-in-out hover:scale-105 p-4 bg-white rounded-lg shadow-lg hover:shadow-2xl">
                            <a href="{{ route('overviewProduct', $like->id) }}" class="text-xl font-semibold hover:text-blue-600">
                            <div class="flex flex-col items-center text-center space-y-4">
                                <img src="{{ Storage::url($like->primeraImagen->url_imagen ?? 'noimage.png') }}" alt="{{ $like->primeraImagen -> desc_imagen }}" class="w-32 h-32 md:w-48 md:h-48 object-cover rounded-lg">
                                <div class="flex-grow">
                                        {{ $like->nombre }}
                                    </a>
                                    <p class="text-lg text-gray-600">{{ number_format($like->precio, 2) }}€</p>
                                    {{-- todo Al pulsar aqui, vemos todos los productos de la subcategoria a la cual se le ha hecho click --}}
                                    <a class="hover:text-red-600" href="{{route('productosConSubcategoria' , $like -> category -> id)}}">{{$like -> category -> nombre }}</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3">
                            <p class="text-gray-800 text-lg text-center">No tienes productos favoritos aún.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="my-8 mx-auto px-6">
            {{ $misLikes->links() }}
        </div>
    </x-propio>
</div>
