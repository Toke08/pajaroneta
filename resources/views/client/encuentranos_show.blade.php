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
<h1>@lang('Today we are at the event {{ $title }}')</h1>
<h3>@lang('Find us at {{ $address }}')</h3>
    <div>
        <iframe src="{{ $url }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@else
<p>@lang('There are no scheduled events for today.')</p>
@endif

<div id="tablaEventos">
    <h2>@lang('Upcoming events')</h2>
    <table class="table">
        <thead>
            <tr>
                <th>@lang('Title')</th>
                <th>@lang('Description')</th>
                <th>@lang('Start')</th>
                <th>@lang('End')</th>
                <th>@lang('Location')</th>
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
