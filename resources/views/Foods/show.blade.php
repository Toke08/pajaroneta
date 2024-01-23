@extends('layout.masterpage')
@section('contenido')
@section('titulo')
Vista de
@endsection
    <h1>{{$food->name}}</h1>
    <p>precio {{$food->price}}</p>
@endsection

