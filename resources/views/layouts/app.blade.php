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

    </script>


</body>


</html>
