<div>
    {{-- ? Miga de pan 12 --}}
    <x-propio>
        {{ Breadcrumbs::render('gestion_usuarios') }}
        <div class="flex w-full mb-2 justify-center">
            <div class="flex items-center justify-center w-full">
                <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-3/4 max-w-md"
                placeholder="Busca un articulo" wire:model.live="buscar">
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Puesto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($User as $usuario)
                        
                    
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            {{$usuario -> id}}
                        </td>
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{$usuario -> profile_photo_url}}"
                                alt="Imagen de perfil del usuario" {{$usuario -> name}}>
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$usuario -> name}}</div>
                                <div class="text-gray-500 font-bold">{{$usuario -> email}}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4 font-bold">
                            @if ($usuario->rol == 'admin' || $usuario->rol == 'superAdmin')
                                Administrador
                            @else
                                User
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div @class(["h-2.5 w-2.5 rounded-full  me-2",
                                "bg-green-500" => $usuario -> rol == "superAdmin" || $usuario -> rol == "admin" ,
                                "bg-red-500" => $usuario -> rol == "user"])></div> {{$usuario -> rol}}
                            </div>
                        </td>
                        @auth
                        <td class="px-6 py-4">
                            {{-- todo Solo le salen los botones a los usuarios que tienen el rango de SuperAdmin o admin --}}
                            @if(auth()->user()->rol == 'superAdmin' || auth()->user()->rol == 'admin')    
                            <a href="{{route('users.edit' , $usuario -> id)}}"><i class="fas fa-edit text-yellow-600 mr-2"></i></a>
                            <button wire:click="pedirConfirmacion({{ $usuario->id }})" type="submit"><i class="fas fa-trash text-red-600"></i></button>
                            @endif
                        </td>
                        @endauth
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        <div class="my-2">
            {{$User -> links()}}
        </div>
    </x-propio>
</div>
