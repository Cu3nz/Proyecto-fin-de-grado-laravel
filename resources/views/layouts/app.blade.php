<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- ? Para los iconos --}}
    {{-- <script src="https://cdn.lordicon.com/lordicon.js"></script> --}}

    {{-- todo CDN para las alertas nuevas --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    


    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    
    


    @if (session('mensaje'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ session('mensaje') }}",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif


    {{-- todo Pedir confirmacion delete --}}
    <script>
        Livewire.on('mensaje', txt => {
            Swal.fire({
                icon: "success",
                title: txt,
                showConfirmButton: false,
                timer: 1500
            });
        })


        Livewire.on('confirmarDeleteCategory', id => {
            Swal.fire({
                title: "¿Estás seguro de eliminar este registro?",
                text: "Esta acción eliminará permanentemente el registro seleccionado. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('principal-category', 'deleteConfirmado', id);
                }
            });
            
        })

        Livewire.on('confirmarDeleteProduct', id => {
            Swal.fire({
                title: "¿Estás seguro de eliminar este registro?",
                text: "Esta acción eliminará permanentemente el registro seleccionado. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('principal-products', 'deleteConfirmado', id);
                }
            });
        })

        Livewire.on('confirmarDeleteUser', id => {
            Swal.fire({
                title: "¿Estás seguro de eliminar este registro?",
                text: "Esta acción eliminará permanentemente el registro seleccionado. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('tabla-users', 'deleteConfirmado', id);
                }
            });
        })

        Livewire.on('confirmarDeleteCarrito', id => {
            Swal.fire({
                title: "¿Estás seguro de eliminar este registro?",
                text: "Esta acción eliminará permanentemente el registro seleccionado. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('cart-livewire', 'deleteConfirmado', id);
                }
            });
        })

        /* Pide confirmacion para eliminar el carrito en la vista de ordenador */
        Livewire.on('confirmarVaciarCarrito', id => {
            Swal.fire({
                title: "¿Estás seguro de vaciar el carrito?",
                text: "Esta acción eliminará permanentemente el carrito actual. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('cart-livewire', 'vaciarCarritoConfirmado', id);
                }
            });
        })
        /* Pide confirmacion para eliminar el carrito en la vista de movil */
        Livewire.on('confirmarVaciarCarritoMovil', id => {
            Swal.fire({
                title: "¿Estás seguro de vaciar el carrito?",
                text: "Esta acción eliminará permanentemente el carrito actual. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('cart-livewire-movil', 'vaciarCarritoConfirmado', id);
                }
            });
        })

        /* Pide confirmacion para eliminar el carrito en la vista de PRECOMPRA */
        Livewire.on('confirmarVaciarCarritoPreCompra', id => {
            Swal.fire({
                title: "¿Estás seguro de vaciar el checkout?",
                text: "Esta acción eliminará permanentemente el checkout. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminalo!",
                reverseButtons: true // Coloca el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('pre-compra', 'vaciarCarritoConfirmadoPreCompra', id);
                }
            });
        })

        
        

    </script>

    {{-- ? script para el borrado de las reseñas imagenes de edit de reseñas y demas --}}

    <script>
        function confirmarDelete(elementId, idFormulario) { //? Pasamos el identificador del elemento y el prefijo del formulario
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción eliminará permanentemente el registro seleccionado. ¿Deseas continuar?",
                icon: "warning",
                showCancelButton: true,
                reverseButtons: true, // Coloca el botón de cancelar a la izquierda
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => { //? Si el usuario confirma la eliminación
                if (result.isConfirmed) {
                    document.getElementById(idFormulario + elementId).submit(); //? Enviamos el formulario con el id compuesto
                }
            });
        }
    </script>

    {{-- todo Notificaciones notyf que he utilizado anteriormente --}}

{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Utiliza la instancia global de Notyf creada en app.js
        @if(session('success'))
            window.notyf.success('{{ session('success') }}');
        @endif
    
        @if(session('error'))
            window.notyf.error('{{ session('error') }}');
        @endif


    });
    </script> --}}

    {{-- todo Nuevas notificaciones para los controladores  --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function isMobile() {
                return window.matchMedia("(max-width: 767.98px)").matches;
            }

            if (isMobile()) {
                toastr.options.positionClass = 'toast-bottom-full-width';
            } else {
                toastr.options.positionClass = 'toast-bottom-right';
            }

            @if(session('success'))
                toastr.success('{{ session('success') }}', 'Éxito');
            @endif

            @if(session('error'))
                toastr.error('{{ session('error') }}', 'Error');
            @endif
        });
    </script>


<script>
    function updateToastrPosition() {
        if (window.matchMedia("(max-width: 767.98px)").matches) {
            toastr.options.positionClass = 'toast-bottom-full-width';
        } else {
            toastr.options.positionClass = 'toast-bottom-right';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateToastrPosition();

        //? Evento para añadir un producto al carrito
        Livewire.on('categoryDelete', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.success(message, 'Borrando categoria...');
        });
        //? Evento para añadir un producto al carrito
        Livewire.on('addProduct', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.success(message, 'Añadiendo al carrito');
        });

        //? Evento para añadir un producto al carrito
        Livewire.on('deleteProduct', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.success(message, 'Eliminando producto...');
        });



        //? Evento para borrar todo el carrito
        Livewire.on('vaciarCarrito', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.success(message, 'Vaciando Carrito...');
        });

        // Escucha el evento de Livewire y muestra la notificación
        Livewire.on('productRemoved', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.success(message, 'Eliminando producto del carrito');
        });

        //? Evento que se ejecuta cuando se intenta borrar un producto que es de otro usuario (Se ejecuta la politica de borrado).
        Livewire.on('PoliticaBorradoDenegada', message => {
            /* console.log('Event received: cartEmptied', message);
            console.log('Attempting to show toastr notification'); */
            toastr.error(message, 'ERROR: Petición denegada');
        });

        //? Evento que se ejecuta cuando borro una imagen de update (product) o edit (review/Reseña)
        Livewire.on('ProductImgEliminado', message => {
        /* console.log('Event received: cartEmptied', message);
        console.log('Attempting to show toastr notification'); */
        toastr.success(message, 'Eliminando Imagen');
        });

        //? Evento que se ejecuta cuando borro un usuario 
        Livewire.on('UserEliminado', message => {
        /* console.log('Event received: cartEmptied', message);
        console.log('Attempting to show toastr notification'); */
        toastr.success(message, 'Eliminando usuario...');
        });

        @if(session('success'))
            console.log('Session success:', '{{ session('success') }}');
            toastr.success('{{ session('success') }}', 'Éxito');
        @endif

        @if(session('msgEnviado'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('msgEnviado') }}', 'Enviando mensaje');
        @endif

        @if(session('reviewCreate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('reviewCreate') }}', 'Creando reseña...');
        @endif
        @if(session('reviewUpdate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('reviewUpdate') }}', 'Actualizando reseña...');
        @endif

        @if(session('reviewDelete'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('reviewDelete') }}', 'Eliminando reseña...');
        @endif

        @if(session('categoryUpdate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('categoryUpdate') }}', 'Actualizando categoria...');
        @endif

        @if(session('categoryCreate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('categoryCreate') }}', 'Creando categoria...');
        @endif

        @if(session('productCreate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('productCreate') }}', 'Creando producto...');
        @endif

        @if(session('productUpdate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('productUpdate') }}', 'Actualizado producto...');
        @endif

        @if(session('userUpdate'))
            /* console.log('Session success:', '{{ session('success') }}'); */
            toastr.success('{{ session('userUpdate') }}', 'Actualizado usuario...');
        @endif

       

        @if(session('error'))
            console.log('Session error:', '{{ session('error') }}');
            toastr.error('{{ session('error') }}', 'Error');
        @endif
    });

    window.addEventListener('resize', function() {
        updateToastrPosition();
    });
</script>



    {{-- todo Si lo quiero poner en la parte de arriba el mensaje y para el movil abajo --}}

    {{-- <script>
        function updateToastrPosition() {
            if (window.matchMedia("(max-width: 767.98px)").matches) {
                toastr.options.positionClass = 'toast-bottom-full-width';
            } else {
                toastr.options.positionClass = 'toast-top-right';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateToastrPosition();

            @if(session('success'))
                toastr.success('{{ session('success') }}', 'Éxito');
            @endif

            @if(session('error'))
                toastr.error('{{ session('error') }}', 'Error');
            @endif
        });

        window.addEventListener('resize', function() {
            updateToastrPosition();
        });
    </script> --}}


    <footer class="bg-white" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
          <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
              <img class="h-36 w-50" src="{{Storage::url('10.svg')}}" alt="">
              <p class="text-xl leading-6 text-gray-600"><p class="text-sm leading-6 text-gray-600">Hacemos del mundo un lugar mejor creando productos únicos y sostenibles hechos a mano con amor y dedicación.</p>            </p>
              {{-- todo redes sociales --}}
              <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-blue-500 ease-in duration-200" aria-label="Facebook">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                  </a>
                  <a href="#" class="text-gray-400 hover:text-purple-500 ease-in duration-200" aria-label="Instagram">
                      <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6 " fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                  </a>                  
                <a href="#" class="text-gray-400 hover:text-black ease-in duration-200" aria-label="X">
                  <span class="sr-only">X</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M13.6823 10.6218L20.2391 3H18.6854L12.9921 9.61788L8.44486 3H3.2002L10.0765 13.0074L3.2002 21H4.75404L10.7663 14.0113L15.5685 21H20.8131L13.6819 10.6218H13.6823ZM11.5541 13.0956L10.8574 12.0991L5.31391 4.16971H7.70053L12.1742 10.5689L12.8709 11.5655L18.6861 19.8835H16.2995L11.5541 13.096V13.0956Z" />
                  </svg>
                </a>
                {{-- <a href="#" class="text-gray-400 hover:text-gray-500" aria-label="Github">
                  <span class="sr-only">GitHub</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                  </svg>
                </a> --}}
                <a href="#" class="text-gray-400 hover:text-red-600 duration-200 ease-in-out" aria-label="Youtube">
                  <span class="sr-only">YouTube</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                  </svg>
                </a>
              </div>
              {{-- todo Fin de redes sociales --}}
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
              <div class="md:grid md:grid-cols-2 md:gap-8">
                <div>
                  <h3 class="text-sm font-semibold leading-6 text-gray-900">Porque comprar</h3>
                  <ul role="list" class="mt-6 space-y-4 ">
                    <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Como comprar</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Formas de pago</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Gastos de envio</a>
                    </li>
                    <li>
                        <a href="#" class="block text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out md:whitespace-nowrap overflow-hidden">Preguntas frecuentes</a>
                    </li> 
                  </ul>
                </div>
                <div class="mt-10 md:mt-0">
                  <h3 class="text-sm font-semibold leading-6 text-gray-900">Quiénes somos</h3>
                  <ul role="list" class="mt-6 space-y-4">
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Quiénes somos</a>
                    </li>
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Compromisos</a>
                    </li>
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Aviso legal</a>
                    </li>
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Privacidad</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="md:grid md:grid-cols-2 md:gap-8">
                <div>
                  <h3 class="text-sm font-semibold leading-6 text-gray-900">Contactar</h3>
                  <ul role="list" class="mt-6 space-y-4">
                    <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Contacto y Ayuda</a>
                      </li>
                      <li>
                        <a href="#" class="block text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-3 py-2 transition-all duration-200 ease-in-out md:whitespace-nowrap overflow-hidden">Devoluciones y Garantía</a>
                      </li>
                      <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Politica de cookies</a>
                      </li>
                      <li>
                        <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900 hover:font-bold hover:bg-gray-300 hover:px-6 py-2 transition-all duration-200 ease-in-out">Privacidad</a>
                      </li>
                  </ul>
                </div>
                {{-- <div class="mt-10 md:mt-0">
                  <h3 class="text-sm font-semibold leading-6 text-gray-900">Legal</h3>
                  <ul role="list" class="mt-6 space-y-4">
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Claim</a>
                    </li>
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Privacy</a>
                    </li>
                    <li>
                      <a href="#" class="text-sm leading-6 text-gray-600 hover:text-gray-900">Terms</a>
                    </li>
                  </ul>
                </div> --}}
              </div>
               <div class="flex justify-center">
{{--                 &copy; 2024 <p xmlns:cc="http://creativecommons.org/ns" class="text-sm flex justify-center items-center">
                    Activa Fitness tiene la licencia
                    <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1" target="_blank"
                        rel="noopener noreferrer" class="inline-block hover:underline ml-1 flex items-center">
                        <span class="sr-only">CC BY-NC-ND 4.0</span>
                        <img class="h-5 mx-1"
                            src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"
                            alt="CC icon">
                        <img class="h-5 mx-1"
                            src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"
                            alt="BY icon">
                        <img class="h-5 mx-1"
                            src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1"
                            alt="NC icon">
                        <img class="h-5 mx-1"
                            src="https://mirrors.creativecommons.org/presskit/icons/nd.svg?ref=chooser-v1"
                            alt="ND icon">
                    </a>
                </p> --}}
              </div> 
            </div>
          </div>
          <div class="mt-16 border-t  border-gray-900/10 flex pt-7 sm:mt-20 lg:mt-24">
            <span class="text-sm">&copy; 2024</span> <p xmlns:cc="http://creativecommons.org/ns" class="text-sm flex justify-center items-center">
                 <span class="sm:px-1">Crocheteando</span> esta bajo la licencia
                <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/?ref=chooser-v1" target="_blank"
                    rel="noopener noreferrer" class="inline-block hover:underline ml-1 flex items-center">
                    <span class="sr-only">CC BY-NC-ND 4.0</span>
                    <img class="h-5 mx-1"
                        src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"
                        alt="CC icon">
                    <img class="h-5 mx-1"
                        src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"
                        alt="BY icon">
                    <img class="h-5 mx-1"
                        src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1"
                        alt="NC icon">
                    <img class="h-5 mx-1"
                        src="https://mirrors.creativecommons.org/presskit/icons/nd.svg?ref=chooser-v1"
                        alt="ND icon">
                </a>
            </p>
          </div>
        </div>
      </footer>




</body>


</html>
