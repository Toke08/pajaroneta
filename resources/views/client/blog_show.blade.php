@extends('layout.masterpage')
@section('estilos')
<style>

.post-container {
    display: flex;
    flex-direction: column;
}

.post-image {
    left: 0;
    top: 0;
    position: absolute;
    width: 100%;
    max-height: 400px;
    object-fit: cover;
}

#content {
    margin-top: 20em;
    position: relative;
}
#content a{
    color: #000000;
    text-decoration: none;
}
#comentarios{
    border-top: 2px solid #000;
    padding-top: 1em;
}

.btn{
    color: #fff;
    display: flex;
    align-items: flex-end;
    position: fixed;
    background-color: #E5A200;
    border: none;
    border-radius: 1.5em;
    position: relative;
    transition: 0.3s ease-in-out;
}

.btn:hover {
    background-color: #CA8F00;
    border: none;
    border-radius: 1.5em;
    color: #fff;

}

.btn:active {
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none; /* Elimina la sombra cuando se hace clic */
    padding: 5px;
}

.form-control{
    border:none;
    background-color:#F4F4F4;
}

.form-control:focus{
    border:none;
    background-color:#F4F4F4;
}

.post-comments {
    display: flex;
    flex-direction: column;
}

.comment-container {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
}

.comment-details {
    margin-left: 10px;
}

.comment-details strong {
    font-weight: bold;
}

.comment-details p {
    margin: 0;
}
.bck p{
    margin-top:2%;
}
</style>
@endsection

@section('contenido')
<div class="post-container">
    <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}" class="post-image">
    <div id="content">
        <div class="bck">
            <button id="volverAlBlog" class="btn">Volver al blog</button>
            <p>Categoría:<a href="{{ route('tags_show', $post->tag) }}">{{ $post->tag->name }}</a></p><br>
        </div>

        <h1>{{ $post->title }}</h1>
        <p class="post-content">{{ $post->content }}</p>

        <!-- Agregar formulario para comentarios -->
        <form id="comentarios" action="{{ route('comments.store', ['post_id' => $post->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <h3 for="comment" class="form-label">Deja un comentario:</h3>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>

        <div class="post-comments">
            @foreach ($comments->reverse() as $comment)
                <div class="comment-container">
                    <img src="{{ asset('img/users') . '/' . $comment->user->profile_img }}" width="50px" style="border-radius:50%;">
                    <div class="comment-details">
                        <strong class="comment">{{ $comment->user->name }}</strong>
                        <p>{{ $comment->comment }}</p>
                        <p>{{ $comment->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection

@section('script')

<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("volverAlBlog").addEventListener("click", function() {
            window.location.href = "{{ route('blog') }}";
        });
    });

    $(document).ready(function() {
        $('#comment').keypress(function(event) {
            // Verifica si la tecla presionada es la tecla "Enter" (código 13)
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault(); // Evita que se ejecute la acción predeterminada de la tecla "Enter"
                $('#comentarios').submit(); // Envía el formulario
            }
        });
    });
</script>

@endsection
