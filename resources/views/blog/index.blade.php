@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
body {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.post {
    flex: 1; /* Hace que cada contenedor ocupe el espacio disponible */
    padding: 15px;
    max-width: 300px; /* Ancho máximo para cada contenedor */

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
    border-radius: 10px; /* Ajusta el valor para cambiar la cantidad de curvatura */
}

</style>
@endsection

@section('contenido')
<body>
    <h2>PajaroBlog</h2>
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
