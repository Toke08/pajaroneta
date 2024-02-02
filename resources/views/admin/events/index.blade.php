@extends('layout.masterpage')

@section('titulo')
Eventos
@endsection
@section('estilos')
<style>
h1{
    font-family: 'Quicksand', sans-serif;

}
#eventos{
    display: flex;
    flex-direction: column;
    border: 2px solid #000000;
    border-radius: 10px;
    font-family: 'Quicksand', sans-serif;

}
.event_title{
    background-color:#A62224;
    color: #ffffff;
    display: flex;
    flex-direction:row;
    border-bottom: 2px solid #000000;
}
label, p{
    width: 30%;
    margin:2%
}
.event_info{
    color: #000000;
    display: flex;
    flex-direction:row;
}





</style>
@endsection

@section('contenido')
<h1>Próximos eventos</h1>
<div id="eventos">
    @foreach ($events as $event)
        <div class="event_title">
            <label>Fecha</label>
            <label>Nombre</label>
            <label>Descripción</label>
        </div>
        <div class="event_info">
            <p>{{$event->date}}</p>
            <p>{{$event->name}}</p>
            <p>{{$event->description}}</p>
        </div>
    @endforeach
</div>
@endsection

