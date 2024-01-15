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



    }
    .food-container img{
        min-width: 100%;
        border-radius: 5%;

    }
</style>
    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        @foreach ($foods as $food)
        <div class="food-container">
            <img src="{{ asset('img/'.$food->img) }}" style="width: 20%; aspect-ratio:1;">
            <h2>{{$food->name}}</h2>
        </div>
        @endforeach
    </div>

@endsection
