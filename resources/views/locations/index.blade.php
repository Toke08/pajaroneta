@extends('layout.masterpage')

@section('titulo')
Ubicaciones
@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')

<h1>Estas son tus ubicaciones que usarás para asignar a tus eventos</h1>
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
            <td>{{ $location->address }}</a></td>
            <td>{{ $location->province}} </a></td>
            <td>{{ $location->city }}</a></td>
            <td>{{ $location->cp }}</a></td>

            <form action="{{ route('ubicaciones.destroy', $location->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="button" class="btn-delete" data-location-id="{{ $location->id }}">Eliminar</button></td>
            </form>
                <form action="{{ route('ubicaciones.edit', $location->id) }}" method="GET">
                @csrf
                <td><button type="submit">Editar</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

<!--
<script>
     const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const locationId = this.getAttribute('data-location-id');
        const mensaje = confirm("¿Deseas eliminar esta ubicación? Se borrarán los eventos relacionados con dicha información");

        if (mensaje) {
            //no se a donde redirigir

        }
    });
});
</script>-->
@endsection



