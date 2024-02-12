@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>

#posts{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}


#posts > img{
    width:100%;
    height:100%;
    border-radius: 1rem;
    object-fit: cover;
}


.restaurants{

    width: 500px;
    padding: 10px;
    max-width: 500px;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#restaurant{
    margin-top: 10%;
}
#div-restaurantes{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}
.cates{
    display:flex;
    flex-direction: row;
    justify-content: center;
}
.cates a{
    margin: 2.5%;
}
</style>





@endsection

@section('contenido')
    <div id="blog">
        <h1>Blog-oneta</h1>
        <p>Publicaciones, opiniones y más...</p>
        <div class="cates">
            @foreach ($tags as $tag)
                <a href="{{ route('tags_show', $tag) }}">{{$tag->name}}</a>
            @endforeach
        </div>



        <div id="posts">
        @foreach ($posts as $post)

            <div class="post">
                <img src="{{asset('img/posts')}}/{{ $post->img }}"><img><br>
                <h3>{{ $post->title }}</h3>
                <a href="blog/{{ $post->id }}">Leer más...</a>
            </div>
        @endforeach
        </div>
    </div>

    <div id="restaurant"></div>
        <h2>¿Estámos lejos?</h2>
        <p>¡Encuentra restaurantes con opciones saludables cerca de ti!</p>
        <div id="div-restaurantes">
            @foreach ($restaurants as $restaurant)
            <div class="restaurants">
                <a href="{{ $restaurant->url_sitio }}" target="blank">{{ $restaurant->name }}</a>
                <p>{{ $restaurant->description }}</p>

                <br>
                <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                <a href="{{ $restaurant->url_maps }}" target="blank">Encuéntralos aquí</a>
            </div>
            @endforeach
        </div>
    </div>

@endsection
