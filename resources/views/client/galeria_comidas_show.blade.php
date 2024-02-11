@extends('layout.masterpage')



@section('titulo')
Vista de {{$food->name}}
@endsection

@section('estilos')
<style>
/* Estilos para el contenedor principal */
.container {
    display: flex;
    align-items: center;
}

/* Estilos para el texto de alimentos */
.food-text {
    width: 50%; /* Ocupa el 50% del ancho del contenedor */
    float: left; /* Coloca el texto a la izquierda */
    margin-right: 20px; /* Espacio entre el texto y la imagen */
}

/* Estilos para la imagen de alimentos */
.food-image {
    width: 50%; /* Ocupa el 50% del ancho del contenedor */
    float: right; /* Coloca la imagen a la derecha */
}

/* Estilos para la imagen de categoría */
.category-image {
    width: 10%; /* Ocupa el 10% del ancho del contenedor */
    margin-top: 20px; /* Espacio entre el texto y la imagen */
}
.btn{
    color: #fff;
    display: flex;
    align-items: flex-end;
    position: fixed;
    background-color: #E5A200;
    border: none;
    border-radius: 1.5em;
    position: relative;
    transition: 0.3s ease-in-out;
}

.btn:hover {
    background-color: #CA8F00;
    border: none;
    border-radius: 1.5em;
    color: #fff;

}

.btn:active {
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none; /* Elimina la sombra cuando se hace clic */
    padding: 5px;
}
</style>
@endsection

@section('contenido')
<div class="container">
    <div class="food-text">
        <button id="volverAGaleria" class="btn">Volver a la galería</button><br>
        <a href="{{ route('galeria_comidas', ['id' => $category->id]) }}">{{$category->name}} ></a>
        <h1>{{$food->name}}</h1>
        <p>{{$food->description}}</p>
        <h2>€{{$food->price}}</h2>

    </div>

    <img src="{{ asset('img/foods') . '/' . $food->img }}" alt="{{ $food->name }}" class="food-image">
</div>
@endsection

@section('script')
<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("volverAGaleria").addEventListener("click", function() {
            window.location.href = "{{ route('galeria_comidas') }}";
        });
    });
</script>
 @endsection
