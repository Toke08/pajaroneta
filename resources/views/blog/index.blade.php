@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
body {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Asegúrate de que el contenido se ajuste al ancho de la pantalla y se envuelva cuando sea necesario */
}

.post {
    flex: 1;
    padding: 15px;
    max-width: 300px;
}

/* Añade una nueva regla para los posts para mostrarlos en línea */
.post {
    flex-basis: calc(33.33% - 20px); /* Ajusta según el número de posts que desees en una fila y el espacio entre ellos */
}

strong {
    color: #333;
}

p {
    margin: 0;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

img {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}


</style>
@endsection

@section('contenido')
<body>
    <h1>PajaroBlog</h1>
    @foreach ($posts as $post)
        <div class="post">
            <img src="{{asset('img/posts')}}/{{ $post->img }}"><img><br>
            <strong>{{ $post->title }}</strong><br>
            <a href="blog/{{ $post->id }}">Leer más...</a>

            <form action="{{ route('blog.destroy', $post->id) }}"   method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Borrar</button>
            </form>
            <form action="{{ route('blog.edit', $post->id) }}" method="GET">
                @csrf
                <button type="submit">Editar</button>
            </form>
        </div>
    @endforeach
</body>
@endsection
