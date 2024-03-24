<x-app-layout>    
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight  text-gray-900">Anime</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($anime as $item)
                <div class="group  relative">
                    <a href="#">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
{{--                             @php
                                $PrimeraImagen = $item -> images -> first();
                            @endphp --}}
                            <img src="{{Storage::url($item -> primeraImagen -> imagen)}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$item -> nombre}}
                                </h3>
                                <p @class(["mt-1 text-sm text-gray-500",
                                "text-red-600" => $item -> estado == 'NO DISPONIBLE',
                                "text-green-600" => $item -> estado == 'DISPONIBLE'])>{{ $item -> estado }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{$item -> precio}}€</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Nuevos</h2>
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($nuevos as $item)
                <div class="group relative">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img src="{{Storage::url($item -> primeraImagen -> imagen)}}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-xl text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$item -> nombre}}
                                </a>
                            </h3>
                            <p @class(["mt-1 text-sm text-gray-500",
                            "text-red-600 line-through" => $item -> estado == 'NO DISPONIBLE',
                            "text-green-600" => $item -> estado == 'DISPONIBLE'])>{{ $item -> estado }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{$item -> precio}}€</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
