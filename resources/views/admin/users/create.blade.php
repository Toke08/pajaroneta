@extends('layout.adminlte-layout')
@section('titulo')
Crear usuario
@endsection

@section('estilos')
<style>
    :root {
        --rojoOscuro: #730000;
        --rojoClaro: #A62224;
        --amarilloOscuro: #CA8F00;
        --amarilloClaro: #E5A200;
        --blanco: #FFFFFF;
        --gris: #F4F4F4;
        --negro: #000000;
    }


</style>
@endsection

@section('contenido')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Introducir nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email *</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Introducir email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña *</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                placeholder="Introducir contraseña">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmar Contraseña *</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirmar contraseña">
            </div>
            <div class="form-group">
                <label>Rol *</label>
                <select name="role_id" id="" class="form-control">
                    <option value="">Seleccionar un rol *</option>
                    @foreach ($roles as $rol)

                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="customFile">Imagen de perfil</label>

                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Escoger imagen</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
<!-- /.card -->


@endsection
