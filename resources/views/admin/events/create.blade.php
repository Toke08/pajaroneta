@extends('layout.masterpage')
@section('titulo')
Evento nuevo
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva evento</h1>

    <form action="{{route('eventos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Crear Evento</button>
    </form>
@endsection

