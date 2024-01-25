@extends('layout.masterpage')
@section('titulo')
    Crear publicación
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

    <h1>Crear publicación</h1>
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <br>

        <label for="content">Contenido:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        <br>

        <label for="img">Imagen:</label>
        <input type="file" id="img" name="img" required>
        <br>

        <label for="date">Fecha:</label>
        <input type="date" id="date" name="date" required>
        <br>

        <label for="tag">Categoría:</label>
        <select name="tag_id" id="tag_id">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="1">Borrador</option>
            <option value="0">Publicado</option>
        </select>
        <br>

        <button type="submit">Publicar</button>
    </form>

@endsection
