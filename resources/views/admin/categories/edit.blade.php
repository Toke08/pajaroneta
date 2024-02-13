@extends('layout.adminlte-layout')
@section('titulo')
Editar categoria
@endsection

@section('estilos')
    <style>

    </style>
@endsection

@section('contenido')

<div class="card card-primary">

    <form action="{{ route('categorias.update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <!-- Vista previa de la imagen actual -->
                <label for="image">Imagen actual:</label><br>
                <img src="{{asset('img/categories')}}/{{$category->img}}" style="max-width: 200px;"><br>
            </div>
            <div class="form-group">
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Cambiar imagen</label>
                </div>
            </div>
            
                <button type="submit" class="btn btn-primary">Guardar</button>
            
    </div>
    </form>

</div>
@endsection
