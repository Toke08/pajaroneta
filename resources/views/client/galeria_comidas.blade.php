@extends('layout.masterpage')

@section('titulo')
    Galería comidas
@endsection

@section('estilos')
<style>
    main *{
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
    }
    .titl{
        margin-top: 3%;
        margin-bottom: 3%;
    }
    .titl p{
        font-size: 1.2em;
        padding-top: 2%;
    }
    body{
        background-color: rgb(255, 255, 255)
        }

    .foods-container{
            display: grid;
            grid-gap:0.5rem;
            grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
            grid-auto-rows: auto;
            grid-auto-flow: dense;



    }
    .food-container{
            display: flex;
            justify-content: center;
            align-items:center;
            opacity: 0;
            animation: fadeIn 1.2s ease forwards;
    }

    .alto{
        grid-row: span 2;
    }
    .ancho{
        grid-column: span 2;

    }
    .grande{
        grid-column: span 2;
        grid-row: span 2;
    }

    img{
            width:100%;
            height:auto;
            vertical-align: middle;
            display: inline-block;

    }

    .food-container > img{
            width:100%;
            height:100%;
            border-radius: 1rem;
            object-fit: cover;
            /* aspect-ratio:1; */
    }

    .ancho{
        aspect-ratio: auto;
    }

    /* CATEGORIAS */

    /* Estilos para el contenedor principal */
.categorias-menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 10px;
}

/* Estilos para cada categoría */
.categoria {
    width: 150px;
    text-align: center;
    margin: 10px;
}

/* Estilos para la imagen */
.categoria img {
    aspect-ratio: 4/3;
    width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
    object-fit: cover;
}
.categoria a{
    color: #000000;
    text-decoration: none;
}

/* Estilos para el texto debajo de la imagen */
.categoria p {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}



    /*EFECTO APARICION*/

    @keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;

    }

}

</style>
@endsection

@section('contenido')
<div class="categorias-menu">
    @foreach ($categories as $category)
    <div class="categoria">
        {{-- envia la id para luego poder cogerlo en el request del controllador (?id=1) --}}
        <a href="{{ route('galeria_comidas', ['id' => $category->id]) }}">
            <img src="{{asset('img/categories')}}/{{$category->img}}">
            <p>{{$category->name}}</p>
        </a>
    </div>
    @endforeach
</div>
        @php
        $delay = 1;
        @endphp

        <div class="titl">
            <h1>¿Con hambre?</h1>
            <p>¡Échale un vistazo a nuestra galería de productos que puedes venir a comer en la Pajaroneta!</p>
        </div>

        <div class="foods-container">
        @foreach ($foods as $food)
        @if($food->id %8==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container grande fadeIn" style="animation-delay: {{$delay * 0.1}}s;">
            <img src="{{ asset('img/foods/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @elseif($food->id %4==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container alto fadeIn" style="animation-delay: {{$delay * 0.1}}s;">
            <img src="{{ asset('img/foods/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @elseif($food->id %3==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container ancho fadeIn" style="animation-delay: {{$delay * 0.1}}s;">
            <img src="{{ asset('img/foods/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @else
        <a href="galeria-comidas/{{$food->id}}" class="food-container" style="animation-delay: {{$delay * 0.1}}s;">
            <img src="{{ asset('img/foods/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @endif

        @php
        $delay++;
        @endphp


        @endforeach
    </div>

@endsection
