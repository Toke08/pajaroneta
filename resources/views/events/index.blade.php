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
        <th scope="col">Acciones</th>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->name}}</td>
            <td>{{ $event->description}}</td>
            <td>{{ $event->date}}</td>

            <td>{{ $event->location->address}}</td>

        <form action="{{ route('eventos.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td><button type="submit">Eliminar</button></td>
        </form>
        <form action="{{ route('eventos.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <td><button type="submit">Editar</button></td>
        </form>
        @endforeach
    </tr>
    </tbody>
</table>

@endsection

