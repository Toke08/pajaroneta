@extends('layout.masterpage')
@section('titulo')
Editar evento
@endsection

@section('estilos')
    <style>

    </style>
@endsection

@section('contenido')
    <h1>Editar evento</h1>

    <form action="{{ route('eventos.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="address">Nombre:</label>
        <input type="text" id="address" name="address" value="{{ $location->address }}" required>
        <br>
        <label for="address">Descripción:</label>
        <input type="text" id="province" name="province" value="{{ $location->province }}" required>
        <br>
        <label for="address">Fecha</label>
        <input type="text" id="city" name="city" value="{{ $location->city }}" required>
        <br>
        <label for="address">Dirección:</label>
        <input type="text" id="cp" name="cp" value="{{ $location->cp }}" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
@endsection
