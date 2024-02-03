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
    Añadir evento
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea un evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('eventos.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <button type="submit">Crear Evento</button>
            </form>

        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar cambios</button>
        </div> --}}
      </div>
    </div>
  </div>



    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubicacion">
    Añadir Ubicación
    </button>

    <!-- Modal -->
    <div class="modal fade" id="ubicacion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea una ubicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('ubicaciones.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="ubi_for">
                    <input type="text" id="address" name="address" placeholder="Dirección" required>
                </div>

                <div class="ubi_for">
                    <input type="text" id="province" name="province" placeholder="Provincia" required>
                </div>
               <div class="ubi_for">
                    <input type="text" id="city" name="city" placeholder="Ciudad" required>
               </div>
               <div class="ubi_for">
                    <input type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
               </div>
               <div class="ubi_btn">
                    <input type="submit" name="" id="" value="Crear ubicación">
               </div>

            </form>

        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar cambios</button>
        </div> --}}
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
