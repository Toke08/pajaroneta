@extends('layout.masterpage')
@section('contenido')
@section('titulo')
Editar categoria
@endsection

    <h1>Editar categoria</h1>
    <p>{{$category->id}}.{{$category->name}}</p>
    <img src="{{asset('img/categories')}}/{{$category->img}}">

@endsection

