@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<h1>Calendario</h1>
<div id="calendario"></div>
{{-- <table class="table table-bordered table-striped">
    <thead class="thead-dark"> <!-- Añade un fondo oscuro al encabezado de la tabla -->
        <tr>
            <th>Fecha</th>
            <th>Evento</th>
            <th>Ubicación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($calendars as $calendar)
            <tr>
                <td>{{ $calendar->date }}</td>
                <td>{{ $calendar->event->name }}</td>
                <td>{{ $calendar->location->city }}, {{ $calendar->location->address }}</td>
                <td>
                    <form action="{{ route('calendario.destroy', $calendar->id) }}"   method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendario');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'

    });
      calendar.render();
    });
  </script>
@endsection

