@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
#calendario {
    position: relative;
    z-index: 0; /* Ajusta el valor según sea necesario */
    margin-top: 5%;
    margin-bottom: 5%
}
</style>
@endsection

@section('contenido')
<h1>Hoy nos encontramos aquí...</h1>

    @if (!is_null($url))
    <div>
        <iframe src="{{ $url }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        @else
        <p>No hay eventos programados para hoy.</p>
    @endif

@endsection
