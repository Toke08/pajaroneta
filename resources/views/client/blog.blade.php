@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
*{
    font-family: 'Quicksand', sans-serif;
}

#blog{
    flex: 1;
    float: right;
    width: 300px;
    padding: 10px;
    max-width: 300px;
}

.restaurants{
    flex: 1;
    float: right;
    width: 500px;
    padding: 10px;
    max-width: 500px;
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
    <div id="blog">
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
    </div>

    <div id="restaurant"></div>
        <h2>¿Estámos lejos?</h2>
        <p>¡Encuentra más opciones saludables cerca a ti!</p>

        @foreach ($restaurants as $restaurant)
        <div class="restaurants">
            <a href="{{ $restaurant->url_sitio }}" target="blank">{{ $restaurant->name }}</a>
            <p>{{ $restaurant->description }}</p>
            <a href="{{ $restaurant->url_maps }}" target="blank">Encuéntralos aquí</a>
            <br>
            <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
        </div>
        @endforeach
    </div>

@endsection
