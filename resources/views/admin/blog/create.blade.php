@extends('adminlte::page')
@section('titulo')
    Crear publicación
@endsection

@section('css')
<style>

</style>
@endsection

@section('content')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
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

        <label for="tag">Categoría:</label>
        <select name="tag_id" id="tag_id">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="Draft">Borrador</option>
            <option value="Published">Publicado</option>
        </select>
        <br>

        <button type="submit">Publicar</button>
    </form>

@endsection
