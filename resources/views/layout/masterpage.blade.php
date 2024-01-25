<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- BOOSTRAP --}}


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="{{ asset('css/general.css')   }}">



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
    @yield('estilos')
</main>


<footer>
@include('layout.footer')
</footer>




</body>
</html>
