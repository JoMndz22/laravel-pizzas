<nav class="navbar navbar-expand-lg bg-header">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/images/logo-pizza.png" class="img-fluid d-block" alt="Best Pizza" width="100px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-reorder text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::path() === '/' ? 'active' :'' }}">
                    <a class="nav-link text-white" href="/">Nuestra Carta</a>
                 </li>
                <li class="nav-item {{ Request::path() === 'crea-tu-pizza' ? 'active' :'' }}">
                    <a class="nav-link text-white" href="/crea-tu-pizza">Crea tu pizza</a>
                </li>
                <li class="nav-item {{ Request::path() === 'sucursales' ? 'active' :'' }}">
                    <a class="nav-link text-white" href="/sucursales">Sucursales</a>
                </li>
                @guest
                    <li class="nav-item {{ Request::path() === 'register' ? 'active' :'' }}">
                        <a class="nav-link text-white" href="{{ route('register') }}">Registrarse</a>
                    </li> 
                    <li class="nav-item {{ Request::path() === 'login' ? 'active' :'' }}">
                        <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link bg-white text-green" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{  auth()->user()->name }} | Cerrar Sesión </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>