@extends('layout.adminlte-layout')
@section('titulo')
    Editar publicaciones
@endsection

@section('estilos')
    <style>

    </style>
@endsection

@section('contenido')
<div class="card card-primary">

    <form action="{{ route('blog.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="title">Nuevo título:</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Nuevo contenido:</label>
                <textarea class="form-control" type="text" id="content" name="content" >{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <!-- Vista previa de la imagen actual -->
                <label for="image">Imagen:</label><br>
                <img src="{{ asset('img/posts/' . $post->img) }}" style="max-width: 300px;"><br>
            </div>
            <div class="form-group">
                <label for="tag_id">Seleccionar etiqueta:</label>
                <select class="form-control"  name="tag_id">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $tag->id == $post->tag_id ? 'selected' : '' }}>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Imagen *</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Elegir imagen</label>
                </div>
            </div>

            <div class="form-group">
                <!-- Sección de estado -->
                <label for="status">Estado:</label>
                <select class="form-control" name="status" id="status">
                    <option value="Draft" {{ $post->status == 'Draft' ? 'selected' : '' }}>Borrador</option>
                    <option value="Published" {{ $post->status == 'Published' ? 'selected' : '' }}>Publicado</option>
                </select>
            </div>



            <input class="btn btn-primary" type="submit" value="Actualizar">
        </div>

    </form>
</div>
@endsection
