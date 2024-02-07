@extends('layout.masterpage')
@section('estilos')
<style>
.post-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
}
</style>
@endsection

@section('contenido')
<div class="post-container">
    <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}" class="post-image">
    <h1>{{ $post->title }}</h1>
    <a href="{{ route('tags_show', $post->tag) }}">{{ $post->tag->name }}</a><br>
    <p class="post-content">{{ $post->content }}</p>
    <a href="{{ route('blog') }}">Volver al blog</a>

    <!-- Agregar formulario para comentarios -->
    <form action="{{ route('comments.store', ['post_id' => $post->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <h3 for="comment" class="form-label">Agregar Comentario:</h3>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <button type="submit" class="btn btn-primary">Comentar</button>
    </form>

    <!-- Mostrar comentarios existentes -->
    <div class="post-comments">
        <h3>Comentarios:</h3>
        @foreach ($comments as $comment)
            <img src="{{ asset('img/users') . '/' . $comment->user->profile_img }}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
            <strong class="comment">{{ $comment->user->name }}<p> {{ $comment->comment }}</p></strong>
        @endforeach
    </div>
</div>
@endsection
