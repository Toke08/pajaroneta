@extends('layout.masterpage')

@section('titulo')
Eventos
@endsection

@section('estilos')
<style>
a {
  text-decoration: none;
}


</style>
@endsection

@section('contenido')

<h1>Estas son los eventos creados</h1>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha del evento</th>
        <th scope="col">Dirección</th>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td><a href="event/{{ $event->name }}">{{ $event->name}}</a></td>
            <td><a href="event/{{ $event->description }}">{{ $event->description}} </a></td>
            <td><a href="event/{{ $event->date }}">{{ $event->date}}</a></td>
            <td><a href="location/{{ $location->id }}">{{ $location->address }}</a></td>

        <form action="{{ route('eventos.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td><button type="submit">Eliminar</button></td>
        </form>
        @endforeach
    </tr>
    </tbody>
</table>

@endsection

