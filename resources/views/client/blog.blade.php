@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>

#posts{
    display: grid;
    grid-gap:1.5rem;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Puedes ajustar el ancho según tus necesidades */
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}

h3{
    font-size: 1.3em;
    margin-top:2%;
    margin-bottom:2%;
}
#posts > img{
    width:100%;
    height:100%;
    border-radius: 1rem;
    object-fit: cover;
}
#posts img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}
#posts button{
    background-color: #E5A200;
    color: #ffffff;
    border: none;
    border-radius: 1.5em;
    width: 30%;
    padding: 2%;
    transition: 0.3s ease-in-out;
}
#posts button:hover{
    background-color: #CA8F00;
    transition: box-shadow 0.3s ease-in-out;
}
#posts button a{
    text-decoration: none;
    color: #ffffff;
}
#posts button:active{
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none;
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
.restaurants a{
    color: #000000;
    text-decoration: none;
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
    color: #000000;
    text-decoration: none;
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
                <button> <a href="blog/{{ $post->id }}">Leer más</a></button>
            </div>
            @endforeach


        </div>
    </div>

    <div id="restaurant"></div>
        <h2>Por si estamos lejos de ti...</h2>
        <p>¡Encuentra restaurantes con opciones saludables cerca de ti!</p>
        <div id="div-restaurantes">
            @foreach ($restaurants as $restaurant)
            <div class="restaurants">
                <a href="{{ $restaurant->url_sitio }}" target="blank">
                    <h3>{{ $restaurant->name }}</h3>

                    <p>{{ $restaurant->description }}</p>

                    <br>
                    <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}"><br>
                </a>
                <a href="{{ $restaurant->url_maps }}" target="blank">Encuéntralos aquí</a>
            </div>
            @endforeach
        </div>
    </div>

@endsection
