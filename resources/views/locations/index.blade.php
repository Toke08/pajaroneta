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
            <form action="{{route('ubicaciones.destroy', $location->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <td><button type="submit">Eliminar</button></td>
            </form>
           <form action="{{ route('ubicaciones.edit', $location->id) }}" method="GET">
                @csrf
                <td><button type="submit">Editar</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

<script>
    const dlt_btn= document.getElementsByTagName("button")[0];

    dlt_btn.addEventListener('click', function(){
        //IF( Hay un evento relacionado con esta ubi )
        alert("Si borras esta dirección, se borrarán todos los eventos que contengan dicha ubi")
    })
</script>

