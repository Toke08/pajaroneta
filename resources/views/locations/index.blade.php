@extends('layout.masterpage')

@section('titulo')
Ubicaciones
@endsection

@section('estilos')
<style>
h1{
    font-family: 'Quicksand', sans-serif;
}
#ubicaciones{
    display: flex;
    flex-direction: column;
    border: 2px solid #000000;
    border-radius: 10px;
    font-family: 'Quicksand', sans-serif;
}
.ubi_title{
    background-color:#A62224;
    color: #ffffff;
    display: flex;
    flex-direction:row;
    border-bottom: 2px solid #000000;
}
label, .ubi_info p{
    width: 30%;
    margin:2%
}
.ubi_info{
    color: #000000;
    display: flex;
    flex-direction:row;
}

/* botones */
button{
    width: 80px;
    height: 45px;
    border-radius: 20px;
    background-color: #A62224;
    color: #ffffff;
    border: none;
    margin: 5%
}
</style>
@endsection

@section('contenido')
<h1>Tus ubicaciones</h1>
<p>Estas son tus ubicaciones que usarás para asignar a tus eventos</p>
<div id="ubicaciones">
    <div class="ubi_title">
        <label>Dirección</label>
        <label>Provincia</label>
        <label>Ciudad</label>
        <label>Código postal</label>
        <label>Eliminar</label>
        <label>Editar</label>
    </div>
    <div>
        @foreach ($locations as $location)
        <div class="ubi_info">
            {{-- <th>id: {{ $location->id }}</th> --}}
            <p>{{ $location->address }}</p>
            <p>{{ $location->province}}</p>
            <p>{{ $location->city }}</p>
            <p>{{ $location->cp }}</p>

            <form action="{{ route('ubicaciones.destroy', $location->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="btn-delete" data-location-id="{{ $location->id }}">Eliminar</button>
            </form>
            <form action="{{ route('ubicaciones.edit', $location->id) }}" method="GET">
                @csrf
                <button type="submit">Editar</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

<!--
<script>
     const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const locationId = this.getAttribute('data-location-id');
        const mensaje = confirm("¿Deseas eliminar esta ubicación? Se borrarán los eventos relacionados con dicha información");

        if (mensaje) {
            //no se a donde redirigir

        }
    });
});
</script>-->
@endsection



