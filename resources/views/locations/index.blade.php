@extends('layout.masterpage')

@section('titulo')
Ubicaciones
@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')

<h1>Estas son tus ubicaciones</h1>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Dirección</th>
        <th scope="col">Provincia</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Código postal</th>
    </thead>
    <tbody>
        @foreach ($locations as $location)
        <tr>
            {{-- <th>id: {{ $location->id }}</th> --}}
            <td>Dirección: <a href="location/{{ $location->address }}">{{ $location->address }}</a></td>
            <td>Provincia: <a href="location/{{ $location->province }}">{{ $location->province}} </a></td>
            <td>Ciudad: <a href="location/{{ $location->city }}">{{ $location->city }}</a></td>
            <td>Código postal: <a href="location/{{ $location->cp }}">{{ $location->cp }}</a></td>
            <form action="" method="POST">
                <td><input type="button" value="Eliminar"></td>
                <td><input type="button" value="Editar"></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

