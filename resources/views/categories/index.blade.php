@extends('layout.masterpage')

@section('titulo')

@endsection

@section('estilos')
<style>



</style>
@endsection

@section('contenido')
@foreach ($categories as $category)
<tr>
    <th scope="row">{{$category->id}}</th>
    <td>{{$category->name}}</td>
    <td><img src="{{asset('img/categories')}}/{{$letter->img}}"></td>
    <td><form action="{{ route('categorias.destroy', $category->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Borrar</button>
    </form></td>
</tr>
@endforeach


@endsection
