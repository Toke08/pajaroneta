@extends('layout.adminlte-layout')
@section('titulo')
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva ubicación</h1>

    <form action="{{route('ubicaciones.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="ubi_for">
            <input type="text" id="province" name="province" placeholder="Provincia" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="city" name="city" placeholder="Ciudad" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="address" name="address" placeholder="Dirección" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="url" name="url" placeholder="Dirección en Google maps" required>
        </div>

        <div class="ubi_for">
            <input type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
        </div>

       <div class="ubi_btn">
            <input type="submit" name="" id="" value="Crear ubicación">
       </div>

    </form>
@endsection
