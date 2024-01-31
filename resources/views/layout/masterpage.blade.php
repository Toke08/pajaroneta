<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajaroneta - @yield('titulo')</title>
    {{-- BOOSTRAP --}}
    <!-- Bootstrap core CSS-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/navbar-top-fixed.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
     @yield('estilos')
</head>

<body>
<header>
    @include('layout.nav')
</header>
<main role="main" class="container">
    <!-- mensajes flash -->
    @if(Session::has('message'))
    <div class="alert alert-info" role="alert">
    {{ Session::get('message')}}
    </div>
    @endif

    <!-- errores de validador -->
    @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{$error}}
        </div>
    @endforeach
    @endif
    @yield('contenido')
    @yield('script')
</main>

<footer>
@include('layout.footer')
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!--   <script src="{{asset('css/bootstrap.min.css')}}"></script>-->
</body>
</html>
