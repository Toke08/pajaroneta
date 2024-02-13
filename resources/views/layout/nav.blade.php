<div class="custom-shape-divider-top-1707134803">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img id="logo" src="{{ asset('img/landing_page/pajaro-01.png') }}"alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span> <!-- Nueva barra -->
        <span class="navbar-toggler-icon"></span> <!-- Nueva barra -->
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('galeria_comidas') }}">@lang('Food Gallery')</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('ubicaciones.index') }}">@lang('Locations')</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('encuentranos') }}">@lang('Find Us')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('blog') }}">@lang('Blog')</a>
            </li>

            @guest

            <li class="nav-item">
                <a id="login-btn" class="nav-link" href="{{ route('login') }}">@lang('Login')</a>
            </li>
        @else
            @if (auth()->user()->isAdmin())
                <!-- Si es un administrador, redirigir al dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('adminHome') }}">@lang('Dashboard')</a>
                </li>

            @else
                <!-- Si no es un administrador, mostrar el nombre del usuario -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_show', ['name' => auth()->user()->name]) }}">@lang('Hello,') {{ auth()->user()->name }}</a>
                </li>
            @endif

            <!-- Común para usuarios y administradores -->
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();">@lang('Logout')</a>
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        @endguest

        </ul>
        <span class="text-white">
            <a href="{{ route('setLanguage','es') }}">ES</a>
            <a href="{{ route('setLanguage','eu') }}">EU</a>
            <a href="{{ route('setLanguage', 'en') }}">EN</a>
        </span>

    </div>
</nav>
