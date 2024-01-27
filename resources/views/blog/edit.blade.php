@extends('layout.masterpage')
@section('titulo')
    Crear comida nueva
@endsection

@section('estilos')
    <style>

    </style>
@endsection

@section('contenido')
    <h1>Editar publicación</h1>

    <form action="{{ route('blog.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen:</label><br>
        <img src="{{asset('img/posts')}}/{{$post->img}}" style="max-width: 200px;"><br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">
    </form>
@endsection
