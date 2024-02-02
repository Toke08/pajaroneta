@extends('layout.masterpage')
@section('titulo')
Ubicación nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva fecha</h1>

<form action="{{ route('calendario.store') }}" method="post">
    @csrf

    <label for="date">Fecha:</label>
    <input type="date" id="date" name="date" required>

    <label for="location">Ubicación:</label>
    <select id="location" name="location_id" required>
        @foreach($locations as $location)
            <option value="{{ $location->id }}">{{ $location->city }}, {{ $location->address }}</option>
        @endforeach
    </select>

    <label for="event">Evento:</label>
    <select id="event" name="event_id" required>
        @foreach($events as $event)
            <option value="{{ $event->id }}">{{ $event->name }}</option>
        @endforeach
    </select>

    <button type="submit">Guardar</button>
</form>

@endsection