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
    <form action="{{route('tags.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre de la Categoría:</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>
            <button class="btn btn-primary" type="submit">Guardar Categoría</button>
        </div>
    </form>
</div>
@endsection
