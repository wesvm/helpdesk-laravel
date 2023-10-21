<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="bg-primary text-white p-4 text-center">
            <h1 class="fs-3 fw-bold">
                <a href="{{ route('index') }}" class="text-white text-decoration-none">TICKETS DE SOPORTE</a>
            </h1>
        </div>
        <nav class="d-flex justify-content-center align-items-center">
            <a class="py-2 px-4" href="{{route('create')}}">Registrar Ticket</a>
            <a class="py-2 px-4" href="{{route('showList')}}">Consultar Ticket</a>
        </nav>
    </header>

    <hr class="m-0" />

    <main class="container mx-auto">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>