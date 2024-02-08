@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
body {
    display: flex;
    align-items: left;
    justify-content: center;
    height: 100vh;
    margin: 0;
}
.post {
    padding: 15px;
    width: 300px; /* Puedes ajustar el ancho según tus necesidades */
    text-align: center;
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
    <a href="{{ route('adminHome') }}">Volver al panel de administrador</a>

    @if(Session::has('error'))
        <p>{{ Session::get('error') }}</p>

    @else
        @if($posts->isEmpty() && $restaurants->isEmpty())
            <strong>No hay publicaciones ni restaurantes relacionados con {{$tag->name}}.</strong>
        @else
            @if(!$posts->isEmpty())
                <strong>Publicaciones relacionadas con {{$tag->name}}</strong><br>

                @foreach($posts as $post)
                    <div class="item">
                        <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}"><br>
                        <strong>{{ $post->title }}</strong>
                        <br>
                        <a href="{{ route('blog_show', $post->id) }}">Leer más...</a>
                    </div>
                @endforeach
            @endif

            @if(!$restaurants->isEmpty())
                <strong>Restaurantes relacionados con {{$tag->name}}</strong>
                @foreach($restaurants as $restaurant)
                    <div class="item">
                        <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                        <strong>{{ $restaurant->name }}</strong>
                        <br>
                        <a href="{{ route('restaurants.show', $restaurant->id) }}">Leer más...</a>
                    </div>
                @endforeach
            @endif
        @endif
    @endif
@endsection
