@extends('layout.admin-layout')

@section('titulo')
    Galeria de comidas
@endsection

@section('estilos')
<style>
    main *{
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
    }
    table img {
        width: 100px;
        height: auto;
    }

</style>
@endsection

@section('contenido')

    <h1>Galeria de comidas</h1>

    <table class="table">
  <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">precio</th>
            <th scope="col">imagen</th>
            <th scope="col">descripcion</th>
            <th scope="col">categoria</th>
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
        </tr>
        @endforeach
    </tbody>
    </table>


@endsection
