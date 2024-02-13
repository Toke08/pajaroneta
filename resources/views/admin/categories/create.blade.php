@extends('layout.adminlte-layout')
@section('titulo')
Crear categoria de comidas
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<div class="card card-primary">


    <form action="{{route('categorias.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Introducir nombre" required>
            </div>
            <div class="form-group">
                <label for="image">imagen *</label>
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
