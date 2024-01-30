@extends('layout.masterpage')
@section('titulo')
Ubicación nueva
@endsection

@section('estilos')
<style>

</style>
@endsection

@section('contenido')

<h1>Nueva ubicación</h1>

    <form action="{{route('ubicaciones.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Dirección:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <label for="image">Provincia</label>
        <input type="text" id="province" name="province" required>
        <br>
        <label for="image">Cuidad:</label>
        <input type="text" id="city" name="city" required>
        <br>
        <label for="image">Código postal</label>
        <input type="text" inputmode="numeric" id="cp" name="cp" required>
        <br>
        <label for="image">Nombre del evento</label>
        <select id="event_id" name="event_id" >
            @foreach ( $events as $event )
            <option value="">No hay evento asignado</option>
            <option value="{{$event->id}}">{{$event->name}}</option>
            @endforeach
        </select>
        <br>

        <input type="submit" name="" id="" value="Crear ubicación">
    </form>

@endsection
