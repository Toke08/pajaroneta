@extends('layout.masterpage')

@section('titulo')
    Galeria de comidas
@endsection

{{-- @section('estilos')
<style>
    body{
background-color: rgb(167, 159, 45)
}

.foods-container{
display: grid;
}

.food-container{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
}

</style>
@endsection --}}

@section('contenido')
<style>
    *{
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
            grid-auto-rows: 200px;
            grid-auto-flow: dense;



    }
    .food-container{
            display: flex;
            justify-content: center;
            align-items:center;



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


</style>
    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        @foreach ($foods as $food)
        @if($food->id %6==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container grande">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @elseif($food->id %2.5==0)
        <a href="galeria-comidas/{{$food->id}}" class="food-container alto">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @else
        <a href="galeria-comidas/{{$food->id}}" class="food-container">
            <img src="{{ asset('img/'.$food->img) }}">
                <!-- <h2>$food->name</h2> -->
            </a>
        @endif


        @endforeach
    </div>

@endsection
