<div class="offcanvas offcanvas-start d-flex flex-column flex-shrink-0 p-3 text-bg-dark d-block d-md-none" tabindex="-1"
    id="offcanvas" aria-labelledby="offcanvasLabel">

    <div class="d-flex justify-content-evenly">
        <div class="text-center">
            <h3 class="fs-5 text-uppercase">{{ auth()->user()->role }}</h3>
            <p>Bienvenido</p>
            <h4 class="fs-6 text-uppercase">
                {{ auth()->user()->first_names }} {{ auth()->user()->last_names }}
            </h4>
        </div>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
            style="background-color: white"></button>
    </div>

    <hr>

    <div class="offcanvas-body">
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

        <a href="{{route('logout')}}" class="d-flex align-items-center text-white text-decoration-none">
            Salir
        </a>
    </div>
</div>