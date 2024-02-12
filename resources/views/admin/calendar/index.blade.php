
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
/* para el modal */
#btn_save{
    background-color:#E5A200;
    border: none;
    border-radius: 1.5em;
    padding: 2%;
    width: 7em;

}
#btn_save:hover{
    background-color:#CA8F00;
}
</style>
@endsection

@section('contenido')
<div id="calendario">
    <table class="table">

        <thead>
            <tr>
                <th>Fecha de inicio</th>
                <th>Fecha de fin</th>
                <th>Evento</th>
                <th>Dirección de la ubicación</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($calendar as $cal)
            <tr>
                <td>{{ $cal->event->title }}</td>
                <td>{{ $cal->location->address }}</td>
                <td>{{ $cal->start }}</td>
                <td>{{ $cal->end }}</td>

                <td>

                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
    {{ $calendar->links() }}
</div>
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calendar">
    Añadir fecha
    </button> --}}
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
                <form action="" method="post">
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

                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <script>
                    // Función para mostrar el mensaje de error y luego ocultarlo después de 10 segundos
                    function showErrorMessage(message) {
                        var errorMessage = document.createElement('div');
                        errorMessage.classList.add('alert', 'alert-danger');
                        errorMessage.textContent = message;
                        document.body.appendChild(errorMessage);

                        // Ocultar el mensaje después de 10 segundos
                        setTimeout(function() {
                            errorMessage.style.display = 'none';
                        }, 10000); // 10 segundos
                    }

                    // Verificar si hay un mensaje de error en la sesión flash y mostrarlo si existe
                    @if (session('error'))
                        showErrorMessage('{{ session('error') }}');
                    @endif
                </script>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

    function confirmDelete(calendarId) {
    if (confirm('¿Estás seguro de que quieres eliminar este elemento?')) {
        var form = document.getElementById('deleteForm_' + calendarId);
        if (form) {
            form.submit();
        }
    }
}
    document.addEventListener('DOMContentLoaded', function() {
        let formulario = document.querySelector("form");
        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: "es",
            displayEventTime: false,
            events: [], // Inicializa sin eventos

            dateClick: function(info) {
                formulario.reset();
                formulario.start.value = info.dateStr;
                $("#calendar").modal("show");
            },
        });

        document.getElementById("btn_save").addEventListener("click", function() {
            let formData = new FormData(formulario);

            $.ajax({
                type: 'POST',
                url: '{{ route('calendario.store') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Agrega el evento al calendario si se guardó exitosamente
                    if (response.success) {
                        calendar.addEvent({
                            title: 'Ubicación ingresada',
                            start: response.start,
                            end: response.end
                        });
                        calendar.refetchEvents();
                        $("#calendar").modal("hide");
                    } else {
                        // Maneja errores si es necesario
                        console.log(response.message);
                    }
                },
                error: function(error) {
                    // Maneja los errores si es necesario
                    console.log(error);
                }
            });
        });
        calendar.render();
    });
    </script>
@endsection
