@extends('layout.masterpage')

@section('titulo')
    Galeria de comidas
@endsection

@section('estilos')
<style>
    main *{
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
    }

    body{
        background-color: rgb(230, 230, 230)
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

    @keyframes fadeIn {
    0% {
        opacity: 0;
        filter:blur(10px);
    }
    10% {
        opacity: 1;
        filter:brightness(1.5) blur(5px);
    }
    100% {
        opacity: 1;

    }
}







</style>
@endsection

@section('contenido')

    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        @foreach ($foods as $food)
        @if($food->id %8==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container grande fadeIn" style="animation-delay: {{$food->id * 0.1}}s;">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @elseif($food->id %4==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container alto fadeIn" style="animation-delay: {{$food->id * 0.1}}s;">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @elseif($food->id %3==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container ancho fadeIn" style="animation-delay: {{$food->id * 0.1}}s;">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @else
        <a href="galeria-comidas/{{$food->id}}" class="food-container" style="animation-delay: {{$food->id * 0.1}}s;">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @endif


        @endforeach
    </div>

@endsection
