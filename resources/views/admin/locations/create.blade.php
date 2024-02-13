@extends('layout.adminlte-layout')
@section('titulo')
Crear nueva Ubicación
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<div class="card card-primary">

    <form action="{{route('ubicaciones.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="province">Provincia:</label>
                <input class="form-control"  type="text" id="province" name="province" placeholder="Provincia" required>
            </div>

            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input class="form-control" type="text" id="city" name="city" placeholder="Ciudad" required>
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Dirección" required>
            </div>

            <div class="form-group">
                <label for="url">Url:</label>
                <input class="form-control"  type="text" id="url" name="url" placeholder="Dirección en Google maps" required>
            </div>

            <div class="form-group">
                <label for="cp">Código postal:</label>
                <input class="form-control" type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
            </div>

            <input class="btn btn-primary" type="submit" name="" id="" value="Crear ubicación">

        </div>
    </form>
</div>
@endsection
