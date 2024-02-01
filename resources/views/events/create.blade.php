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
        <label for="date">Fecha evento:</label>
        <input type="date" id="date" name="date" required>
        <br>
        <div>
        <h2>¿Dónde se llevará a cabo el evento?</h2>
        <p>{{}}</p>
        </div>
        <button type="submit">Crear Evento</button>
    </form>
@endsection

