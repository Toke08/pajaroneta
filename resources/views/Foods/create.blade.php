@extends('layout.masterpage')
@section('titulo')
Crear comida nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Crear comida nueva</h1>


    <form action="{{route('galeria-comidas.create')}}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" required>
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
