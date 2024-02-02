@extends('layout.masterpage')

@section('titulo')
Eventos
@endsection
@section('estilos')
<style>
h1{
    font-family: 'Quicksand', sans-serif;

}
#eventos{
    display: flex;
    flex-direction: column;
    border: 2px solid #000000;
    border-radius: 10px;
    font-family: 'Quicksand', sans-serif;

}
.event_title{
    background-color:#A62224;
    color: #ffffff;
    display: flex;
    flex-direction:row;
    border-bottom: 2px solid #000000;
}
label, p{
    width: 30%;
    margin:2%
}
.event_info{
    color: #000000;
    display: flex;
    flex-direction:row;
}

</style>
@endsection

@section('contenido')
<h1>Próximos eventos</h1>
<div id="eventos">
    @foreach ($events as $event)
        <div class="event_title">
            <label>Fecha</label>
            <label>Nombre</label>
            <label>Descripción</label>
        </div>
        <div class="event_info">
            <p>{{$event->date}}</p>
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

