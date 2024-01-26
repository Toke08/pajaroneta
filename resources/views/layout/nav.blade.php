<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="{{route('home')}}">Papaluis</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{route('galeria-comidas.index')}}">{{__('Galería de comidas')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ubicaciones.index')}}">{{__('Encuéntranos')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog.index')}}">{{__('Blog')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog.create')}}">{{__('Crear publicación')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tags.index')}}">{{__('Ver categorías blog')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tags.create')}}">{{__('Crear categoría blog')}}</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a>
          </li>

          @else
          @if (auth()->user()->isAdmin())
            <li class="nav-item active">
                <a class="nav-link" href="#">Lista de roles <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Lista de cartas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('blog.create')}}">{{__('Panel dmin')}}</a>
            </li>
          @endif

          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
            <form id="logout" action="{{route('logout')}}" method="POST" >
                @csrf
            </form>
          </li>
          @endguest
        </ul>
        <span  class="text-white">
            <a  href="#">ES</a>
            <a  href="#">EU</a>
        </span>
      </div>
    </nav>
