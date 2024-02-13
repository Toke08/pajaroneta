@extends('layout.masterpage')

@section('titulo')

@endsection

@section('estilos')
<style>
#calendario {
    position: relative;
    z-index: 0; /* Ajusta el valor según sea necesario */
    margin-top: 5%;
    margin-bottom: 5%
}
</style>
@endsection

@section('contenido')

<h1>@lang( "Today we are here...")</h1>

<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.5165004228597!2d-2.9419887246831182!3d43.26155407767463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e502842c84087%3A0x539b319a98f8cfbe!2sC.%20del%20Lic.%20Poza%2C%2031%2C%20Abando%2C%2048011%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1707666740981!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<h2>@lang("Check our calendar and find where we´ll be!")</h2>
<div id="calendario"></div>

<div id="evento-ubicacion-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Evento y ubicación del día seleccionado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="evento-ubicacion-info"></p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es", // idioma español
    });
    calendar.render();

    function obtenerEventoUbicacion(fechaSeleccionada) {

        return "Evento: Evento de ejemplo\nUbicación: Ubicación de ejemplo";
    }

    function mostrarModalEventoUbicacion(eventoUbicacion) {
        document.getElementById("evento-ubicacion-info").innerText = eventoUbicacion;
        $("#evento-ubicacion-modal").modal("show");
    }
});


</script>
@endsection



