
@extends('layout.adminlte-layout')

@section('titulo')
Calendario
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<div id="calendar"></div>
<h2>Eventos asignados</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Ubicación</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->start }}</td>
                <td>{{ $event->end }}</td>
                <td>{{ $event->location ? $event->location->address : 'N/A' }}</td>
                <td>
                    <form action="{{ route('evento.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
</div>
@endsection

@push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    // Redireccionar a la página de creación de eventos
                    window.location.href = "{{ route('evento.create') }}?selected_date=" + info.dateStr;
                },
            });
            calendar.render();
        });
      </script>
@endpush
