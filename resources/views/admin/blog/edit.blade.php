@extends('adminlte::page')
@section('titulo')
    Crear comida nueva
@endsection

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <h1>Editar publicación</h1>

    <form action="{{ route('blog.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Nuevo título:</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required>
        <br>
        <label for="content">Nuevo contenido:</label>
        <input type="text" id="content" name="content" value="{{ $post->content }}">
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen:</label><br>
        <img src="{{ asset('img/posts/' . $post->img) }}" style="max-width: 300px;"><br>

        <!-- Selección de la etiqueta -->
        <label for="tag_id">Seleccionar etiqueta:</label>
        <select name="tag_id">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ $tag->id == $post->tag_id ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>

         <!-- Sección de estado -->
        <label for="status">Estado:</label>
        <select name="status" id="status">
            <option value="Draft" {{ $post->status == 'Draft' ? 'selected' : '' }}>Borrador</option>
            <option value="Published" {{ $post->status == 'Published' ? 'selected' : '' }}>Publicado</option>
        </select>
        <br>

        <br>
        <input type="submit" value="Actualizar">


    </form>
@endsection
