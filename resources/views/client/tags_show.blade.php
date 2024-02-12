@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
/* body {

    align-items: left;
    justify-content: center;
    height: 100vh;
    margin: 0;
} */
/* .post {
    padding: 15px;
    width: 300px; /* Puedes ajustar el ancho según tus necesidades
    text-align: center;
} */

.titulo{
    padding-top:2%;
    padding-bottom:2%;
}

p {
    margin: 0;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
.item{
    width: 50%;
}
.item a{
    color: #000000;
}
.item img {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 50%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px; /* Ajusta el valor para cambiar la cantidad de curvatura */
}
.btn_back{
    background-color:#E5A200 ;
    width: 15%;
    height: 2em;
    border:none;
    padding-top: 0.2%;
    border-radius:1.5em;
    text-align: center
}
.btn_back a{
    color: #ffffff;
    text-decoration: none;
}
.publis{
    width: 100%;
    display: flex;
    flex-direction: row;
    margin-bottom: 5%;

}
.publis a{
    text-decoration: none;
    color: #ffffff;
}
.publis button{
    background-color: #E5A200;
    border: none;
    border-radius: 1.5em;
    width: 20%;
    padding: 2%;
    transition: 0.3s ease-in-out;
}
</style>
@endsection

@section('contenido')
    <div class="btn_back">
        <a href="{{ route('blog') }}">Volver al blog</a>
    </div>


    <div class="blog_conte">
        @if(Session::has('error'))
        <p>{{ Session::get('error') }}</p>

    @else
        <div class="">
            @if($posts->isEmpty() && $restaurants->isEmpty())
            <div class="titulo">
                <strong>No hay publicaciones ni restaurantes relacionados con {{$tag->name}}.</strong>
            </div>
            @else
        </div>

            @if(!$posts->isEmpty())
                <div class="titulo">
                    <strong>Publicaciones relacionadas con {{$tag->name}}</strong><br>
                </div>
            <div class="publis">
                @foreach($posts as $post)
                    <div class="item">
                        <img src="{{ asset('img/posts') . '/' . $post->img }}" alt="{{ $post->title }}"><br>
                        <h3>{{ $post->title }}</h3>
                        <br>
                        <button><a href="{{ route('blog_show', $post->id) }}">Leer más</a></button>

                    </div>
                @endforeach
            </div>
            @endif

            @if(!$restaurants->isEmpty())
                <div class="titulo">
                    <strong>Restaurantes relacionados con {{$tag->name}}</strong>
                </div>
                <div class="publis">
                @foreach($restaurants as $restaurant)
                    <div class="item">
                        <h3> <a href="{{ $restaurant->url_sitio }}">{{ $restaurant->name }}</strong></h3>
                        <p>{{ $restaurant->description }}</p>

                        <br>
                        <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                        <a href="{{ $restaurant->url_maps }}">Encuéntralo aquí</a>
                    </div>
                @endforeach
                </div>
            @endif
        @endif
    @endif
    </div>

@endsection
