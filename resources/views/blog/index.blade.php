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

    <div>
        <strong>Título:</strong> {{ $datos['title'] }}
    </div>

    <div>
        <strong>Contenido:</strong> {{ $datos['content'] }}
    </div>

    <div>
        <strong>Imagen:</strong> {{ $datos['img'] }}
    </div>

    <div>
        <strong>Fecha:</strong> {{ $datos['date'] }}
    </div>

    <div>
        <strong>Tagname:</strong> {{ $datos['tags'] }}
    </div>

</body>
@endsection
