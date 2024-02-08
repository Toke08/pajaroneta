@extends('layout.adminlte-layout')
@section('contenido')
@section('titulo')
Vista de burguer
@endsection
    <h1>{{$food->name}}</h1>
    <p>precio {{$food->price}}</p>
@endsection

