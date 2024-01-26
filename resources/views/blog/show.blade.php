@extends('layout.masterpage')
@section('titulo')
@endsection

@section('contenido')
    <img src="{{asset('img/posts')}}/{{ $post->img }}">
    <h1>{{$post->title}}</h1>
    <a href="{{ route('tags.show', ['id' => $post->tag->id]) }}">{{$post->tag->name}}</a><br>
    <p>{{$post->content}}</p>
@endsection

