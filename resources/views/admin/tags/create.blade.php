@extends('layout.masterpage')
@section('titulo')
    Crear publicación
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
<h1>Formulario de Ingreso de Nueva Categoría</h1>

<form action="{{route('tags.store')}}" method="POST">
    @csrf
    <label for="name">Nombre de la Categoría:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <button type="submit">Guardar Categoría</button>
</form>

@endsection
