<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
</head>

<body>

    <div class="d-flex flex-nowrap min-vh-100 h-auto">
        <aside class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px">
            <div class="text-center">
                <h3 class="fs-5 text-uppercase">{{ auth()->user()->role }}</h3>
                <p>Bienvenido</p>
                <h4 class="fs-6 text-uppercase">
                    {{ auth()->user()->first_names }} {{ auth()->user()->last_names }}
                </h4>
            </div>

            <hr>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('dashboard.index')}}"
                        class="nav-link{{ request()->routeIs('dashboard.index') ? ' active' : ' text-white' }}"
                        aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="{{route('soporte.index')}}"
                        class="nav-link{{ request()->routeIs('soporte.index') ? ' active' : ' text-white' }}">Soporte
                        Tecnico</a>
                </li>
                <li>
                    <a href="{{route('users.index')}}" class="nav-link{{ request()->routeIs('users.index') ? ' active' : ' text-white'
                    }}">Usuarios</a>
                </li>
            </ul>
            <hr>

            <a href="{{route('logout')}}" class="d-flex align-items-center text-white text-decoration-none">Salir</a>
        </aside>

        <div class="w-100">
            <header class="border-bottom shadow">
                <div class="m-3 d-flex justify-content-between align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        style="width: 1.75rem; height: 1.75rem">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                    <h4 class="fs-6 text-uppercase">
                        {{ auth()->user()->first_names }} {{ auth()->user()->last_names }}
                    </h4>
                </div>
            </header>

            <main class="container mx-auto my-3">
                @yield('content')
            </main>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>