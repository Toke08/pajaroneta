@extends('layout.masterpage')
@section('titulo')
Nuevo evento
@endsection

@section('estilos')
<style></style>
@endsection

@section('contenido')

<h1>Nuevo evento</h1>

    <form action="{{route('eventos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="ubi_for">
            <input type="text" id="title" name="title" placeholder="Nombre del evento" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="description" name="description" placeholder="Descripción del evento" required>
        </div>
       <div class="ubi_btn">
            <input type="submit" name="" id="" value="Crear evento">
       </div>
    </form>
@endsection

