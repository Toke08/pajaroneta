@extends('layout.masterpage')
@section('titulo')
@section('contenido')
@endsection
<h1>{{$tag->name}}</h1>
    <p>Esta es la vista en detalle del {{$tag->name}}</p>
@endsection

