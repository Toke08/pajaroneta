@extends('layout.masterpage')
@section('titulo')
Ubicación nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva ubicación</h1>

    <form action="{{route('location.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Dirección:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Provincia</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Cuidad:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Código postal</label>
        <input type="text" id="name" name="name" required>
    </form>

@endsection
