@extends('layout.masterpage')
@section('titulo')
    Galeria de comidas
@endsection
@section('estilos')
<style>
    body{
background-color: rgb(167, 159, 45)
}
</style>
@endsection
@section('contenido')
    <h1>Galeria de comidas</h1>
    {{-- <ul>
        @foreach ($users as $user)
            <li> <strong>ID</strong>: {{ $user->id }}, <strong>Nombre: </strong>: <a
                    href='usuario/{{ $user->id }}'>{{ $user->name }}</a></li>
        @endforeach
    </ul> --}}

        @foreach ($foods as $food)
        <div class="food-container">
            <img src="{{$food->img_food}}">
            <h2>{{$food->name}}</h2>
        </div>
        @endforeach
@endsection
