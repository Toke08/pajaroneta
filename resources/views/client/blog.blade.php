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
#restaurant{
    font-size:1.5em;
}
</style>
@endsection

@section('contenido')
<body>
    <h1>Blog-oneta</h1>
    <p>Publicaciones, opiniones y más...</p>
    @foreach ($tags as $tag)
    <a href="{{ route('tags_show', $tag) }}">{{$tag->name}}</a>

    @endforeach

    @foreach ($posts as $post)
        <div class="post">
            <img src="{{asset('img/posts')}}/{{ $post->img }}"><img><br>
            <h3>{{ $post->title }}</h3>
            <a href="blog/{{ $post->id }}">Leer más...</a>
        </div>
    @endforeach

    <h2>¿Estámos lejos?</h2>
    <p>¡Encuentra más opciones saludables cerca a ti!</p>

    @foreach ($restaurants as $restaurant)

    <div class="restaurant">
        <a id="restaurant" href="{{ $restaurant->url }}" target="_blank">{{ $restaurant->name }}</a>
        <p>{{ $restaurant->description }}</p>
        <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}">
    </div>
    @endforeach

</body>
@endsection
