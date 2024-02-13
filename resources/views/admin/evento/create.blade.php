@extends('layout.adminlte-layout')
@section('titulo')
Crear nuevo evento
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<div class="card card-primary">
    <form action="{{ route('evento.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">

                <div class="form-group">
                    <label for="title">Nombre evento:</label>
                    <input  class="form-control" type="text" id="title" name="title" placeholder="Nombre del evento" required>
                </div>


                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea class="form-control" type="text" id="description" name="description" placeholder="Descripción del evento" required></textarea>
                </div>


                <div class="form-group" style="display: none;">
                    <label for="start">Fecha de inicio:</label>
                    <input class="form-control" type="hidden" id="start" name="start" value="{{ request()->input('selected_date') }}" readonly>
                </div>


            <div class="form-group">
                <label for="end">Fecha de fin:</label>
                <input class="form-control" type="datetime-local" id="end" name="end" required>
            </div>

            <div class="form-group">
                <label for="id_location">Ubicación:</label>
                <select class="form-control" id="id_location" name="id_location" required>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->address }}</option>
                    @endforeach
                </select>
            </div>


            <input class="btn btn-primary" type="submit" value="Crear evento">

        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var startDateInput = document.getElementById('start');
        var selectedDate = '{{ $selectedDate }}';
        var formattedDate = selectedDate.replace(' ', 'T');

        startDateInput.value = formattedDate;

        startDateInput.readOnly = true;
    });
</script>
@endsection
