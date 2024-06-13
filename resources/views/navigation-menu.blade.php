<nav x-data="{ open: false }" class="bg-white border-b sticky top-0 z-50 border-gray-100">
    <!-- Primary Navigation Menu -->
    {{-- ? Navegacion mañana retocar --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- <x-application-mark class="block h-9 w-auto" /> --}}
                        {{-- ! lo puedo subir hasta h-20 o 24 --}}
                        <img src="{{ Storage::url('10.svg') }}" class="object-contain h-16 w-auto sm:w-70" alt="Logo">
                    </a>
                    
                </div>

                <!-- Navigation Links -->
                <div class="hidden w-full space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @if (!Auth::check()) {{-- ! Si no estas registrado sale este link --}}
                    <x-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        <i class="fas fa-home mr-2"></i>{{ __('Home') }}
                    </x-nav-link>
                    @endif

                    @auth {{-- * Sale cuando esta registrado --}}
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home mr-2"></i>{{ __('Inicio') }}
                    </x-nav-link>
                    @endauth
                    {{-- @auth
                    @if(auth()->user()->rol == 'superAdmin' || auth()->user()->rol == 'admin')
                        <x-nav-link href="{{ route('Category.principal') }}" :active="request()->routeIs('Category/*')">
                            <i class="fa-solid fa-list mr-2"></i>{{ __('Admin Categorias') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('products.principal') }}" :active="request()->routeIs('Products/*')">
                            <i class="fa-solid fa-list mr-2"></i>{{ __('Gestion Productos') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('tableUser') }}" :active="request()->routeIs('Products/*')">
                            <i class="fa-solid fa-users mr-2"></i>{{ __('Gestion Usuarios') }}
                        </x-nav-link>
                    @endif
                @endauth --}}
                    <x-nav-link href="{{ route('category.index') }}" :active="request()->routeIs('category/*')">
                        <i class="fa-solid fa-list mr-2"></i>{{ __('Categorias') }}
                    </x-nav-link>
                    
                    
                    @auth {{-- * Sale cuando esta registrado en la pagina --}}
                    @if(auth()->user()->rol == 'user')
                    <x-nav-link href="{{ route('verLikes') }}" :active="request()->routeIs('likes')">
                        <i class="fa-sharp fa-solid fa-heart mr-2"></i>{{ __('Ver Favoritos') }}
                    </x-nav-link> 
                    @endif
                    @if(auth()->user()->rol == 'superAdmin' || auth()->user()->rol == 'admin')
                    <x-nav-link id="boton-menu-admin" type="button" data-objetivo-drawer="drawer-administracion" data-mostrar-drawer="drawer-administracion" aria-controls="drawer-administracion">
                        <i class="fa-solid fa-user-tie mr-2"></i> Administrar
                    </x-nav-link>
                    @endif
                    @endauth

                    <x-nav-link href="{{ route('mail.pintar') }}" :active="request()->routeIs('email/*')">
                        <i class="fa-solid fa-envelope mr-2"></i>{{ __('Contacto') }}
                    </x-nav-link>

                </div>
            </div>
            {{-- ? Menu para el administrador --}}
<!-- menu desplegable -->
<div id="drawer-administracion" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-96 dark:bg-gray-800" tabindex="-1" aria-labelledby="etiqueta-drawer-navegacion">
    <h5 class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menú de Administración</h5>
    <button type="button" data-ocultar-drawer="drawer-navegacion" aria-controls="drawer-navegacion" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Cerrar menú</span>
    </button>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="ejemplo-dropdown" data-toggle-collapse="ejemplo-dropdown">
                    <i class="fa-solid fa-user-tie mr-2"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Administrar</span>
                    <svg class="w-3 h-3" aria-hidden="true" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="ejemplo-dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('Category.principal') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-folder mr-2"></i>
                            Gestionar Categorias
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.principal') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-box mr-2"></i>
                            Gestionar Productos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tableUser') }}" class="flex items=center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i class="fa-solid fa-users mt-1 mr-2"></i>
                            Gestionar Usuarios
                        </a>
                    </li>
                </ul>
                </ul>
            </li>
        </ul>
    </div>
</div>

            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>


                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                {{-- ? Añadir el carrito cuando he iniciado sesion --}}
                {{--  <div onclick="toggleDrawer(event)" type="button" class="hover:bg-gray-200 py-3 px-3 w-auto rounded-lg cursor-pointer">
                <div class="relative inline-block text-center">
                    <!-- Botón del carrito con contador -->
                    <button class="relative ml-3 text-gray-700 font-medium focus:outline-none">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <div class="absolute top-0 -right-1 transform translate-x-1/4 -translate-y-1/4">
                            <span class="inline-flex mb-7 items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                        </div>
                        </div>
                    </button>
                    <span class="text-md ml-2">Mi cesta</span>
                </div>  --}}
                {{-- todo OFFCANVASSS!!!!!!! --}}
                {{-- <div id="drawer-right-example" class="fixed top-0 right-0 transform translate-x-full z-40 h-screen p-4 overflow-y-auto bg-white w-96 dark:bg-gray-800 transition-transform duration-300 ease-out" tabindex="-1" aria-labelledby="drawer-right-label">
                    <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                        Lista de la compra
                    </h5>
                    <button onclick="toggleDrawer(event)" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <span class="sr-only">Close menu</span>
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="">
                        @foreach (Cart::content() as $item)
                        <div class="flex items-center justify-between py-4">
                            <div class="flex items-center">
                                <img src="{{ asset($item->options->image_url) }}" alt="{{ $item->name }}" class="h-24 w-24 object-cover rounded mr-4">
                                <div class="text-white">
                                    <div class="text-sm font-semibold">{{ $item->name }}</div>
                                    <div class=" text-sm">{{ number_format($item->price, 2) }}€</div>
                                    <div class=" text-xs">Unidades: {{ $item->qty }}</div>
                                </div>
                            </div>
                            <form  action="{{ route('removeProductCarrito', $item -> id) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 mr-7 mb-10">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/drxwpfop.json"
                                        trigger="morph"
                                        state="morph-trash-in"
                                        colors="primary:#c71f16,secondary:#e83a30"
                                        style="width:3vh;height:4vh"
                                    >
                                    </lord-icon>
                                </button>
                                
                                
                                
                            </form>
                        </div>
                        @endforeach
                    </div>
                    
                    @if(Cart::content() -> count() > 0)
                   <div class="text-white mt-2">
                    <p>Subtotal Sin IVA {{Cart::subtotal()}}€</p>
                    <p>IVA (21%): {{Cart::tax()}}€</p>
                    <p>Total con IVA: {{Cart::total()}}€</p>
                   </div>
                    <form action="{{route('carrito.destroy')}}" method="POST">
                        @csrf
                        <div class="flex justify-center">
                        <button type="submit" class="mt-4 w-80 bg-red-500 text-white px-4 py-2 rounded-md">Vaciar Carrito</button>
                        </div>
                    </form>
                    @else
                    @endif
                </div>  --}}
                {{-- ! Componente carrito pc --}}
                {{-- <x-cart-item/> --}} {{-- ? cart item de componente --}}
                @livewire('cart-livewire')
                
 
            </div>  {{-- ! NO COMENTAR ELIMINA EL MENU HAMBURGUESA --}}
            
            @else
            
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-black dark:hover:text-red-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-black dark:hover:text-red-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            @endauth

            <!-- Hamburger -->
            <div class="flex justify-center sm:hidden items-center">
                @auth
                {{-- <x-cart-item-movil/> --}}
                @livewire('cart-livewire-movil')
                @endauth
            </div>
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!-- Botón del Carrito para Móviles -->
   {{--  <div onclick="toggleDrawerMobile(event)" class="cursor-pointer hover:bg-gray-200 py-3 px-3 w-full text-center rounded-lg" aria-labelledby="offcanvasMobile">
       <i class="fas fa-shopping-cart text-xl"></i>
       <span>Mi cesta</span>
       <span class="ml-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded-full">
        {{ $productosEnCarrito->sum('cantidad') }}
       </span>
    </div> --}}
    
    {{-- ? Para movil  --}}
{{--     <div id="offcanvasMobile" class="fixed top-0 right-0 transform translate-x-full z-40 h-screen p-4 overflow-y-auto bg-white w-full dark:bg-white transition-transform duration-300 ease-out" tabindex="-1">
       <h5 class="inline-flex items-center mb-4 text-md  font-bold text-black dark:text-black">
           Tú lista de la compra
       </h5>
       <button onclick="toggleDrawerMobile(event)" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
           <span class="sr-only">Close menu</span>
           <i class="fas fa-times"></i>
       </button>
       <div>
              @foreach (Cart::content() as $item)
              <div class="flex items-center border border-gray-200 p-2 my-3 rounded-md">
                  <div class="h-16 w-16 bg-gray-200 rounded-full">
                  <img src="{{asset($item -> options -> image_url)}}" title="{{$item -> name}}" alt="">    
                  </div>
                  <div class="ml-2">
                      <div class="text-sm font-medium text-black">{{ $item->name }}</div>
                      <div class="text-sm text-black"> Cantidad: {{ $item->qty }}</div>
                  </div>
                  <form  action="{{ route('removeProductCarrito', $item -> id) }}" method="POST">
                      @csrf
                      <button type="submit" class="text-red-500 ml-10 ">Eliminar</button>
                  </form>
              </div>
                @endforeach

                @if(Cart::content() -> count() > 0)
                <form action="{{route('carrito.destroy')}}" method="POST">
                    @csrf
                    <button type="submit" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-md">Vaciar Carrito</button>
                </form>
                @else
                @endif
       </div> 
    </div> --}}
    
            {{-- ! Componente carrito movil --}}
            
            

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            @auth
            @if(auth()->user()->rol == 'superAdmin' || auth()->user()->rol == 'admin')
            <x-responsive-nav-link href="{{ route('Category.principal') }}" :active="request()->routeIs('Category/*')">
                <i class="fa-solid fa-folder mr-2"></i>{{ __('Gestionar Categorias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('products.principal') }}" :active="request()->routeIs('Category/*')">
                <i class="fa-solid fa-box mr-2"></i>{{ __('Gestionar Productos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('tableUser') }}" :active="request()->routeIs('Users/*')">
                <i class="fa-solid fa-users mr-2"></i>{{ __('Gestionar Usuarios') }}
            </x-responsive-nav-link>
            @endauth
            @endauth
            <x-responsive-nav-link href="{{ route('category.index') }}" :active="request()->routeIs('Category/*')">
                <i class="fa-solid fa-list mr-2"></i>{{ __('Categorias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('verLikes') }}" :active="request()->routeIs('likes')">
                <i class="fa-solid fa-thumbs-up mr-2"></i>{{ __('VerLikes') }}
            </x-responsive-nav-link>

        </div>

        <!-- Responsive Settings Options -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
        @else
        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-black dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-black dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        @endauth
    </div>
</nav>


{{-- ? para pantallas grandes a partir de tablets --}}
{{-- <script>
    // Función para alternar el drawer
    function toggleDrawer(event) {
        event.stopPropagation(); // Detiene la propagación para evitar que el clic se maneje en otros elementos.
        const drawer = document.getElementById('drawer-right-example');
        // Alternar la visibilidad del drawer
        drawer.classList.toggle('translate-x-full');
    }
    
    // Escuchar clics en el documento para cerrar el drawer si está abierto
    document.addEventListener('click', function(event) {
        const drawer = document.getElementById('drawer-right-example');
        // Si se hace clic fuera del drawer y el drawer está visible, lo cierra
        if (!drawer.contains(event.target) && !drawer.classList.contains('translate-x-full')) {
            closeDrawer();
        }
    });
    
    // Función para cerrar el drawer
    function closeDrawer() {
        const drawer = document.getElementById('drawer-right-example');
        // Asegura que el drawer se oculte si no está oculto
        if (!drawer.classList.contains('translate-x-full')) {
            drawer.classList.add('translate-x-full');
        }
    }
    </script> --}}


{{-- ? Para moviles --}}

{{-- <script>
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


    </script> --}}

    {{-- ? Para el menu de administracion --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
    const botonAdmin = document.getElementById('boton-menu-admin');
    const drawer = document.getElementById('drawer-administracion');
    const overlay = document.createElement('div');
    
    overlay.className = 'fixed inset-0 bg-black bg-opacity-50 z-30 hidden';

    document.body.appendChild(overlay);

    botonAdmin.addEventListener('click', function() {
        drawer.classList.toggle('-translate-x-full');  // Para mostrar/ocultar el menú
        overlay.classList.toggle('hidden');  // Para mostrar/ocultar el fondo oscuro
    });

    overlay.addEventListener('click', function() {
        drawer.classList.add('-translate-x-full');  // Ocultar el menú
        overlay.classList.add('hidden');  // Ocultar el fondo oscuro
    });

    document.querySelector('[data-ocultar-drawer="drawer-navegacion"]').addEventListener('click', function() {
        drawer.classList.add('-translate-x-full');  // Ocultar el menú
        overlay.classList.add('hidden');  // Ocultar el fondo oscuro
    });

    // Añadir toggle para los submenús
    document.querySelectorAll('[data-toggle-collapse]').forEach(button => {
        button.addEventListener('click', function() {
            const dropdown = document.getElementById(this.getAttribute('aria-controls'));
            dropdown.classList.toggle('hidden');
        });
    });
});

        </script>
        

       {{--  <script>
            // set the tooltip content element
const $targetEl = document.getElementById('tooltip-animation');

// set the element that trigger the tooltip using hover or click
const $triggerEl = document.getElementById('tooltip-animation');

// options with default values
const options = {
    placement: 'bottom',
    triggerType: 'hover',
    onHide: () => {
        console.log('tooltip is shown');
    },
    onShow: () => {
        console.log('tooltip is hidden');
    },
    onToggle: () => {
        console.log('tooltip is toggled');
    },
};


// instance options with default values
const instanceOptions = {
  id: 'tooltipContent',
  override: true
};
        </script> --}}
   

        
    
    
   
    
