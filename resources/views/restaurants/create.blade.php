@extends('layout.masterpage')
@section('titulo')
    Crear restaurante sugerido
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<h1>Formulario de Ingreso de Nueva Categoría</h1>

<form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="name">Nombre del restaurante:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="description">Descripción:</label>
    <textarea id="description" name="description" required></textarea>
    <br>

    <label for="url">URL:</label>
    <input type="text" id="url" name="url" required>
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
