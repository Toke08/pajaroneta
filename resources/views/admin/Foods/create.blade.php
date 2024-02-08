@extends('layout.adminlte-layout')
@section('titulo')
Crear comida nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>

<h1>Crear comida nueva</h1>


    <form action="{{route('galeria-comidas.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Nombre:</label>
        <br>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descripcion:</label>
        <br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea>
        <br>
        <label for="price">Precio:</label>
        <br>
        <input type="text" id="price" name="price" required>
        <br>
        <label for="categories">categoria:</label>
        <br>
        <select name="categories" id="">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Enviar">



    </form>
@endsection
