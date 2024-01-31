@extends('layout.masterpage')
@section('titulo')
Crear categoria nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Crear categoria nueva</h1>


    <form action="{{route('categorias.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Imagen actual:</label><br>
        <!-- Hacer con js que por defecto se muestre la imagen categorydefaultimg.png, y si lo cambia que se muestre al mismo momento la foto -->
        <!-- <img src="{{asset('img/categories')}}/{{$category->img}}" style="max-width: 200px;"><br> -->
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Enviar">



    </form>
@endsection
