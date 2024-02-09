
@extends('layout.adminlte-layout')

@section('titulo')
@endsection

@section('estilos')
<style>
#mapa{
    margin-top: 5%;
    margin-bottom: 5%;
}
#calendario{
    z-index: 1;
}
iframe{
    width: 100%;
}
</style>
@endsection

@section('contenido')

<h1>Hoy nos encontramos en...</h1>

<div id="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.5165004229702!2d-2.941988723335174!3d43.26155407767247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e502842c84087%3A0x539b319a98f8cfbe!2sC.%20del%20Lic.%20Poza%2C%2031%2C%20Abando%2C%2048011%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1707304758249!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

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
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="end">Fecha de fin</label>
                    <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
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

        console.log(formulario.event.id.value);

        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale:"es", //idioma español
        displayEventTime:false,
        


        dateClick:function(info){  //la info recoge el dia que haces click

            var event=info.event;

            formulario.reset(); //reseteo form
            formulario.start.value=info.dateStr; //pilla la fecha elegida del calendario
            $("#calendar").modal("show"); //al hacer click en la fecha que salga el modal evento jeje

          






        },


        eventClick:function(info){

            var event=info.event;

            axios.post("http://localhost/pajaroneta/public/eventos/editar/"+info.event.id)
            .then(
                (respuesta)=>{
                formulario.title.value=respuesta.data.title;
                formulario.description.value=respuesta.data.description;
                formulario.start.value=respuesta.data.start;
                formulario.end.value=respuesta.data.end;
                $("#calendar").modal("show");
            }
            )
            .catch((error) => {
            console.error('Error en la solicitud:', error);

        if (error.response) {
            console.error('Respuesta del servidor:', error.response.data);
            // Muestra mensajes de error al usuario si es necesario
        } else if (error.request) {
            console.error('No se recibio respuesta del servidor');
        } else {
            console.error('Error durante la solicitud:', error.message);
        }
        });

    }

    });
      calendar.render();

    });
</script>