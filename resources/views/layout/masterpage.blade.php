<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    {{-- BOOSTRAP --}}


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">



</head>
<body>



<header>
@include('layout.nav')
</header>

<main role="main" class="container">
    @yield('contenido')
</main>


<footer>
@include('layout.footer')
</footer>




</body>
</html>
