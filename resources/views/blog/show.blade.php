@extends('layout.masterpage')
@section('titulo')
@endsection

@section('contenido')
    <img src="{{asset('img/posts')}}/{{ $post->img }}">
    <h1>{{$post->title}}</h1>
    <a href="">{{$post->tag->name}}</a>
    <p>{{$post->content}}</p>
@endsection

