@extends('layout.adminlte-layout')
@section('titulo')
Editar categoria
@endsection

@section('estilos')
    <style>

    </style>
@endsection

@section('contenido')
    <h1>Editar categoria</h1>

    <form action="{{ route('categorias.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen actual:</label><br>
        <img src="{{asset('img/categories')}}/{{$category->img}}" style="max-width: 200px;"><br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">
    </form>
@endsection
