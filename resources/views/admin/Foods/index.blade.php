@extends('layout.adminlte-layout')

@section('titulo')
    Comidas
@endsection

@section('estilos')
<style>
    table img {
            width: 100px;
            height: auto;
        }





</style>
@endsection

@section('contenido')


    <table class="table">
  <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">precio</th>
            <th scope="col">imagen</th>
            <th scope="col">descripcion</th>
            <th scope="col">categoria</th>
            <th scope="col">Acciones</th>
        </tr>
  </thead>
  <tbody>


        @foreach ($foods as $food)
        <tr>
            <th scope="row">{{$food->id}}</th>
            <td><a href="{{ route('galeria-comidas.show', ['id' => $food->id]) }}">{{$food->name}}</a></td>
            <td>{{$food->price}}</td>
            <td><img src="{{ asset('img/foods/'.$food->img) }}"></td>
            <td>{{$food->description}}</td>
            <td>{{$food->category->name}}</td>
            <td>
                <form action="{{ route('galeria-comidas.edit', $food->id) }}" method="GET">
                    @csrf
                    <button type="submit">Editar</button>
                </form>

                <form action="{{ route('galeria-comidas.destroy', $food->id) }}"   method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>


@endsection
