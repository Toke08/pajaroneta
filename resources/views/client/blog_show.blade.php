@extends('layout.masterpage')
@section('estilos')
<style>
.post-container {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.post-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
}

.post-content {
    max-width: 800px;
    margin: 20px;
}

.post-comments {
    border-top: 1px solid #ccc;
    padding: 20px;
}

.comment {
    margin-bottom: 10px;
}

form {
    margin-top: 20px;
}

.form-label {
    margin-bottom: 5px;
}
</style>
@endsection

@section('contenido')
<div class="post-container">
    <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}" class="post-image">
    <h1>{{ $post->title }}</h1>
    <a href="{{ route('tags.show', $post->tag) }}">{{ $post->tag->name }}</a><br>
    <p class="post-content">{{ $post->content }}</p>
    <button type="submit" class="btn btn-primary" href="{{ route('blog') }}">Volver al blog</button>

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
            <strong class="comment">{{ $comment->user->name }}</strong> <p>dijo: {{ $comment->comment }}</p>
        @endforeach
    </div>
</div>
@endsection
