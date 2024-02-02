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
<div id="calendario"></div>

 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evento">
    Añadir fecha
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea tu evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guadar cambios</button>
        </div>
      </div>
    </div>
  </div>

{{-- <form action="{{ route('calendario.store') }}" method="post">
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
</form> --}}

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
