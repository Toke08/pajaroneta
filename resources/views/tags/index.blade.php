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
                <td><a href="tags/{{ $tag->id }}">{{ $tag->name }}</a></td>
                <form action="{{ route('tags.destroy', $tag->id) }}"   method="POST">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit">Borrar</button></td>
                </form>
            </tr>
            @endforeach
        </tbody>
    </div>
</table>
@endsection