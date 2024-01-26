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
<body>
    <h2>PajaroBlog</h2>
    @foreach ($posts as $post)
        <div class="post">
            <img src="{{asset('img/posts')}}/{{ $post->img }}"><img><br>
            <strong>{{ $post->title }}</strong><br>
             <!--<p>{{ $post->content }}</p>-->
            <!--<strong>Categorías</strong> <p>{{ $post->tag_id}}</p>-->
            <a href="blog/{{ $post->id }}">Leer más...</a>
        </div>
    @endforeach
</body>
@endsection
