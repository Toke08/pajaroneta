@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<body>
    <a href="{{ route('adminHome') }}">Volver al panel de administrador</a>

    <h2>Restaurantes sugeridos</h2>
    @foreach ($restaurants as $restaurant)
    <div class="restaurant">
        <p>Nombre: {{ $restaurant->name }}</p>
        <p>Descripción: {{ $restaurant->description }}</p>
        <p>Tag: {{ $restaurant->tag->name }}</p>
        <a href="{{ $restaurant->url }}" target="_blank">Visitar sitio</a>
        <img src="{{ asset('img/restaurants') . '/' . $restaurant->img }}" alt="{{ $restaurant->name }}">

        <!-- Agrega aquí tus botones de borrar y editar -->
        <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
        </form>
        <form action="{{ route('restaurants.edit', $restaurant->id) }}" method="GET">
            @csrf
            <button type="submit">Editar</button>
        </form>
    </div>
@endforeach
</body>
@endsection
