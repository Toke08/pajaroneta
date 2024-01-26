@extends('layout.masterpage')
@section('titulo')
@endsection

@section('contenido')
    <h2>Publicaciones relacionadas con {{$tag->name}}</h2>

    @foreach($posts as $post)
        <div>

            <p>{{ $post->content }}</p>
            <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}">
            <strong>{{ $post->title }}</strong>
            <br>
            <!--<strong>Categorías</strong> <p>{{ $post->tag_id }}</p>-->
            <a href="../blog/{{ $post->id }}">Leer más...</a>
        </div>
    @endforeach
@endsection
