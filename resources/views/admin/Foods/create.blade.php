@extends('layout.adminlte-layout')
@section('titulo')
Crear plato nuevo
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<div class="card card-primary">

    <form action="{{route('galeria-comidas.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Introducir nombre" required>
            </div>
            <div class="form-group">
                <label for="description">Descripcion *</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50" placeholder="Introducir descripcion" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio *</label>
                <input class="form-control" type="text" id="price" name="price" placeholder="Introducir precio" required>
            </div>
            <div class="form-group">
                <label for="categories">categoria *</label>
                <select class="form-control" name="categories" id="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">imagen</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Elegir imagen</label>
                </div>
            </div>
            
                <button type="submit" class="btn btn-primary">Guardar</button>
            
        </div>


    </form>
</div>
@endsection
