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
        <label for="image">Descripción:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <label for="image">Fecha evento:</label>
        <input type="date" id="date" name="date" required>
        <br>
        <label for="">Dirección</label>
        <select id="location_id" name="location_id" >
            <option value=""></option>
        </select>
        <br>
        <input type="Submit" value="Crear evento">
    </form>

@endsection
