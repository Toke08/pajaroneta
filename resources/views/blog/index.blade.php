@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<body>
    <h2>Datos del Formulario</h2>
    @foreach ($posts as $post)
        <div>
            <strong>Título:</strong> <p>{{ $post->title }}</p>

            <strong>Contenido:</strong> <p>{{ $post->content }}</p>

            <img src="{{asset('img/post')}}/{{ $post->img }}"><img>

            <strong>Tagname:</strong> <p>{{ $post->tag_id }}</p>
        </div>
    @endforeach
</body>
@endsection
