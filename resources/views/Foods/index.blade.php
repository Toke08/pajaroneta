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
body{
    background-color: rgb(230, 230, 230)
    }
    .foods-container{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap:1rem;

    }
    .food-container{
        /* aspect-ratio: 1 / 1; */
        object-fit: fill;
    }

    .food-container:nth-child(1){
        grid-column: span 2;
        grid-row: span 1;
    }
.food-container{



}
.food-container{



}
    .food-container img{
        border-radius: 2rem;
        width: 100%;
        /* aspect-ratio:1; */


    }


</style>
    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        @foreach ($foods as $food)
        <div class="food-container">
            <img src="{{ asset('img/'.$food->img) }}">
            <h2>{{$food->name}}</h2>
        </div>
        @endforeach
    </div>

@endsection
