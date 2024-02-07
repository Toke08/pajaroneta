@extends('adminlte::page')
@section('titulo')
@endsection

@section('css')
<style>

</style>
@endsection

@section('content')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
    <h1>Lista de categorías blog</h1>

    @if(count($tags) > 0)
        <table>
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nombre de categoría</th>
                <th scope="col">Acción</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag) }}">{{ $tag->name }}</a></td>

                        <td>
                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <strong>No hay categorías disponibles.</strong>
    @endif
@endsection
