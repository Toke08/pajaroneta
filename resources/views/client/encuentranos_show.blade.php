@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
<style>
#tablaEventos{
    margin-top: 5%
}
</style>
@endsection

@section('contenido')
@if (!is_null($url))
<h1>Hoy nos encontramos en el evento {{ $title }}</h1>
<h3>Encuentrálos es: {{ $address }}</h3>
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
                <th>Titulo</th>
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
