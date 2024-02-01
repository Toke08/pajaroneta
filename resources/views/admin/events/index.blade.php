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

<h1>Próximos eventos</h1>
<div
    >@foreach ($events as $event)
        <div>
            <h1>Fecha</h1>
            <p>{{$event->date}}</p>
        </div>
        <div>
            <h2>Info general</h2>
            <p>{{$event->name}}</p>
            <p>{{$event->description}}</p>
        </div>
    @endforeach
</div>



{{--
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

            <td>{{ $event->location->province}}</td>
            <td>{{ $event->location->city}}</td>
            <td>{{ $event->location->cp}}</td>
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
</table> --}}

@endsection

