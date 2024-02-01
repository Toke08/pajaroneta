@extends('layout.masterpage')
@section('titulo')
    Crear restaurante sugerido
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
<h1>Crear nuevo restaurante sugerido</h1>

<form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Nombre del restaurante:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="description">Descripción:</label>
    <textarea id="description" name="description" required></textarea>
    <br>

    <label for="url_sitio">URL de sitio web:</label>
    <input type="text" id="url_sitio" name="url_sitio" required>
    <br>

    <label for="url_maps">URL Google Maps:</label>
    <input type="text" id="url_maps" name="url_maps" required>
    <br>

    <label for="image">Imagen:</label>
    <input type="file" name="img" accept="image/*" required>
    <br>

    <label for="tag">Categoría:</label>
        <select name="tag_id" id="tag_id">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>

    <button type="submit">Crear nuevo restaurante sugerido</button>
</form>

@endsection
