@extends('layout.adminlte-layout')
@section('titulo')
Crear comida nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Editar comida</h1>


    <form action="{{route('galeria-comidas.update', $food->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <br>
        <input type="text" id="name" name="name" value="{{ $food->name }}" required>
        <br>
        <label for="description">Descripcion:</label>
        <br>
        <textarea id="description" name="description" rows="4" cols="50" required>{{ $food->description }}</textarea>
        <br>
        <label for="price">Precio:</label>
        <br>
        <input type="text" id="price" name="price" value="{{ $food->price }}" required>
        <br>
        <label for="categories">categoria:</label>
        <br>
        <select name="category_id" id="">
            @foreach($categories as $category)
                <option @php if($category->id == $food->category->id) { echo("selected"); } @endphp value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <br>
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">



    </form>
@endsection
