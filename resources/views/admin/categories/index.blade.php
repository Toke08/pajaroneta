@extends('layout.adminlte-layout')

@section('titulo')
Categorias
@endsection

@section('estilos')
<style>

img{
    width: 200px;
}

</style>
@endsection

@section('contenido')
@foreach ($categories as $category)
<tr>
    <th scope="row">{{$category->id}}</th>
    <td>{{$category->name}}</td>
    <td><img src="{{asset('img/categories')}}/{{$category->img}}"></td>
    <td><form action="{{ route('categorias.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Borrar</button>
    </form></td>
    <td><form action="{{ route('categorias.edit', $category->id) }}" method="GET">
        @csrf
        <button type="submit">Editar</button>
    </form></td>

</tr>
@endforeach


@endsection
