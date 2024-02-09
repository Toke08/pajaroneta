
@extends('layout.adminlte-layout')

@section('titulo')
Calendario
@endsection

@section('estilos')
<style>
#mapa{
    margin-top: 5%;
    margin-bottom: 5%;
}
#calendario{
    z-index: 1;
    max-width: 100vh;
}
iframe{
    width: 100%;
}
</style>
@endsection

@section('contenido')

<div id="caja_info"></div>

<div id="calendario"></div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calendar">
    Añadir fecha
    </button>
    <div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Fecha nueva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('calendario.store') }}" method="post">
                @csrf
                {{-- <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date">
                </div> --}}
                <div class="form-group">
                <label for="event">Nombre del evento:</label>
                    <select id= "event" name="event_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        @foreach($events as $event)
                            <option id="title" name="title" value="{{ $event->id }}">{{ $event->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">¿Donde se ubicará?</label>
                        <select id="location" name="location_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->city }}, {{ $location->address }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="start">Fecha de inicio</label>
                    <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId">
                    <small id="" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="end">Fecha de fin</label>
                    <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId">
                    <small id="" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <button id="btn_save" type="submit">Guardar</button>
            </form>

        </div>

      </div>
    </div>
  </div>
@endsection


@section('script')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        // recoge los datos del form jquery
        let formulario=document.querySelector("form");



        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale:"es", //idioma español
        displayEventTime:false,




        dateClick:function(info){  //la info recoge el dia que haces click



            formulario.reset(); //reseteo form
            formulario.start.value=info.dateStr; //pilla la fecha elegida del calendario



            $("#calendar").modal("show"); //al hacer click en la fecha que salga el modal evento jeje

        },



        eventClick:function(info){}

    });
      calendar.render();

    });
</script>
