@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
<style>
#tablaEventos{
    margin-top: 5%
}
iframe{
    border-radius:1.5em;
    box-shadow: 2px 4px 20px -3px rgba(0,0,0,0.54);
}
.caj{
    background-color:#730000;
    color: white;
    border-radius: 1.5em;
    padding: 3%;
    width:45%;
    margin-top: 3%;
    margin-bottom: 3%;
    box-shadow: 2px 4px 20px -3px rgba(0,0,0,0.54);
}
.caj p{
    font-size:1.2em;
}
</style>
@endsection

@section('contenido')
<h1>@lang("Toady we will be...")</h1>
@if (!is_null($url))
<div class="caj">
    <p>@lang("Today we are at the event"): {{ $title }}</p>
    <p>@lang("Find us at"): {{ $address }}</p>
</div>

    <div>
        <iframe src="{{ $url }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@else
<p>@lang("There are no events for today")
</p>
@endif

<div id="tablaEventos">
    <h2>@lang("Next events")</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Ubicación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ Carbon\Carbon::parse($event->start)->format('Y-m-d') }}</td>
                <td>{{ Carbon\Carbon::parse($event->end)->format('Y-m-d') }}</td>
                <td>{{ $event->location->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
