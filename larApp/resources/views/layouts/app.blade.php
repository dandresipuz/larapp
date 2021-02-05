<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.navbar')

    <main class="py-4">
        @yield('content')
    </main>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: "{{ session('message') }}",
                    icon: 'success',
                    confirmButtonColor: '#1e5f74',
                    confirmButtonText: 'Aceptar'
                });
            @endif
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                });
            @endif
            $('#photo').change(function(event) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
</body>

</html>
