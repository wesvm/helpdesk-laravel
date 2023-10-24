<aside class="d-md-flex flex-column flex-shrink-0 p-3 text-bg-dark d-none" style="width: 280px">
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