<div>
    <x-propio>


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
                        <td class="px-6 py-4">
                           <form action="" method="post"> {{-- ? Route destroy pasando el id del usuario --}}
                            @csrf
                            @method('delete') 
                            <a href=""><i class="fas fa-edit text-yellow-600 mr-2"></i></a>
                            <button type="submit"><i class="fas fa-trash text-red-600"></i></button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-2">
                {{ $User->links() }}
            </div>
    </x-propio>
</div>
