@extends('layout.adminlte-layout')
@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<h1>Nuevo evento</h1>

<form action="{{ route('evento.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="ubi_for">
        <input type="text" id="title" name="title" placeholder="Nombre del evento" required>
    </div>

    <div class="ubi_for">
        <input type="text" id="description" name="description" placeholder="Descripción del evento" required>
    </div>

    <div class="ubi_for" style="display: none;">
        <label for="start">Fecha de inicio:</label>
        <input type="hidden" id="start" name="start" value="{{ request()->input('selected_date') }}" readonly>
    </div>

    <div class="ubi_for">
        <label for="end">Fecha de fin:</label>
        <input type="datetime-local" id="end" name="end" required>
    </div>

    <div class="ubi_for">
        <label for="id_location">Ubicación:</label>
        <select id="id_location" name="id_location" required>
            @foreach ($locations as $location)
                <option value="{{ $location->id }}">{{ $location->address }}</option>
            @endforeach
        </select>
    </div>

    <div class="ubi_btn">
        <input type="submit" value="Crear evento">
    </div>
</form>
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
