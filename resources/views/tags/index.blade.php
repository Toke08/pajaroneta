@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<table>
    <h1>Lista de categorías blog</h1>
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nombre de categoría</th>
            <th scope="col">Acción</th>
        </thead>
        <tbody>
        <div class="foods-container">
            @foreach ($tags as $tag)
            <tr>
                <th>{{ $tag->id }}</th>
                <td><a href="tags/{{ $tag->name }}">{{ $tag->name }}</a></td>
                <td><input type="button" value="Eliminar" style="background-color:red;border:none;color:white;"></td>
            </tr>
            @endforeach
        </tbody>
    </div>

</table>
@endsection
