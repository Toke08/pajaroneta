@extends('layout.masterpage')

@section('contenido')
    <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}">
    <h1>{{ $post->title }}</h1>
    <a href="{{ route('tags.show', $post->tag) }}">{{ $post->tag->name }}</a><br>
    <p>{{ $post->content }}</p>
    <a href="{{ route('blog.index') }}">Volver al blog</a>


        <!-- Agregar formulario para comentarios -->
        <form action="{{ route('comments.store', ['post_id' => $post->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Agregar Comentario:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>

        <!-- Mostrar comentarios existentes -->
        <h3>Comentarios:</h3>
        @foreach ($comments as $comment)
            <p>{{ $comment->user->name }} dijo: {{ $comment->comment }}</p>
        @endforeach


@endsection
