@extends('layout.masterpage')

@section('titulo')

@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')

<h1>Calendario</h1>
<div id="calendario"></div>


@endsection

@section('script')
<script>

document.addEventListener('DOMContentLoaded', function() {

    let formulario=document.querySelector("form");
    var calendarEl = document.getElementById('calendario');

    var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',

    locale:"es", //idioma español
    displayEventTime:false,
    })
});

</script>
@endsection



