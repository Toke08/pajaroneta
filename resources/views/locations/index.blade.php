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
        <th scope="col">Eliminar</th>
        <th scope="col">Editar</th>
    </thead>
    <tbody>
        @foreach ($locations as $location)
        <tr>
            {{-- <th>id: {{ $location->id }}</th> --}}
            <td><a href="location/{{ $location->address }}">{{ $location->address }}</a></td>
            <td><a href="location/{{ $location->province }}">{{ $location->province}} </a></td>
            <td><a href="location/{{ $location->city }}">{{ $location->city }}</a></td>
            <td><a href="location/{{ $location->cp }}">{{ $location->cp }}</a></td>
            <form action="{{route('ubicaciones.destroy', $location->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit">Eliminar</button></td>
                <td><button type="submit">Editar</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

