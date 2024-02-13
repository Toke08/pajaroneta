@extends('layout.adminlte-layout')

@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<h1>Tus ubicaciones</h1>
<p>Estas son tus ubicaciones que usarás para asignar a tus eventos</p>
<a href="{{ route('ubicaciones.create') }}" class="btn btn-primary">Crear nueva ubicación</a>

<div id="ubicaciones">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Código postal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->address }}</td>
                <td>{{ $location->province }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->cp }}</td>
                <td>
                    <!-- Botón para eliminar -->
                    <form action="{{ route('ubicaciones.destroy', $location->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


