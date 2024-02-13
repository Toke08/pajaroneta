@extends('layout.adminlte-layout')
@section('titulo')
Crear publicación
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')
<div class="card card-primary">
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">Título *</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Ingrese el título de la publicación" required>
            </div>
            <div class="form-group">
                <label for="content">Contenido *</label>
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Ingrese el contenido de la publicación..." required></textarea>
            </div>
            <div class="form-group">
                <label for="customFile">Imagen *</label>

                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Elige una imagen</label>
                </div>
            </div>
            <div class="form-group">
                <label for="tag">Categoría *</label>
                <select class="form-control" name="tag_id" id="tag_id">
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Estado *</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Draft">Borrador</option>
                    <option value="Published">Publicado</option>
                </select>
            </div>


            <button class="btn btn-primary" type="submit">Guardar</button>

        </div>
    </form>
</div>
@endsection
