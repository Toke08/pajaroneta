<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{route('home')}}">Pajaroneta</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('galeria_comidas')}}">@lang('Food Gallery')</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ubicaciones.index') }}">@lang('Locations')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('encuentranos.index') }}">@lang('Find Us')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('blog') }}">@lang('Blog')</a>
        </li>

        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">@lang('Register')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">@lang('Login')</a>
        </li>

          @else
          @if (auth()->user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminHome')}}">@lang('Admin Panel')</a>
            </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();">@lang('Logout')</a>
            <form id="logout" action="{{route('logout')}}" method="POST" >
                @csrf
            </form>
          </li>
          @endguest
        </ul>
        <span  class="text-white">
            <a  href="{{route('setLanguage','es')}}">ES</a>
            <a  href="{{route('setLanguage','eu')}}">EU</a>
            <a href="{{ route('setLanguage', 'en') }}">EN</a>
        </span>
      </div>
    </nav>
