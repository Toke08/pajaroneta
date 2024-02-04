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
        <input type="text" id="name" name="name" value="{{ $location->name }}" required>
        <br>
        <label for="address">Descripción:</label>
        <input type="text" id="description" name="description" value="{{ $event->description }}" required>
        <br>
        <label for="address">Fecha</label>
        <input type="text" id="date" name="date" value="{{ $event->date }}" required>
        <br>
        <label for="address">Dirección:</label>
        <select id="location_id" name="location_id" >
                @foreach ( $locations as $location )
                <option value="{{$location->id}}">{{$location->address}}</option>
                @endforeach
        </select>


        <br>
        <button type="submit">Actualizar</button>
    </form>
@endsection
