{{-- @extends('layout.masterpage')

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
 --}}


@extends('layout.masterpage')
@section('titulo')

@endsection

@section('estilos')
<style></style>
@endsection

@section('contenido')

<h1>Calendario</h1>
<div id="calendario"></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#event">
    Añadir evento
    </button>

    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea un nuevo evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">

                @csrf
                {{-- Agregar id --}}
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId">
                </div>

                <div class="form-group">
                    <label for="title">Nombre del evento</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId">
                    {{-- <small id="helpId" class="form-text text-muted"> Holasss esto no se que es</small> --}}
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea  class="form-control" name="description" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="start">Start</label>
                    <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId">
                    {{-- <small id="helpId" class="form-text text-muted"> Fecha incio del evento</small> --}}
                </div>
                <div class="form-group">
                    <label for="end">End</label>
                    <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId">
                    {{-- <small id="helpId" class="form-text text-muted"> Fecha fin del evento</small> --}}
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_save">Guardar</button>
            <button type="button" class="btn btn-warning"  id="btn_modify">Editar</button>
            <button type="button" class="btn btn-danger" id="btn_delete">Eliminar</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



@endsection
@section('script')
<script>

    document.addEventListener('DOMContentLoaded', function() {
        // recoge los datos del from jquery
        let formulario=document.querySelector("form");




        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',


        locale:"es", //idioma español

        events:"http://localhost/pajaroneta/public/eventos/mostrar",

        dateClick:function(info){   //la info recoge el día que haces click
            $("#event").modal("show"); //al hacer click en la fecha que salga el modal evento jjejjej
        }


    });
      calendar.render();

      //capturo la accion del btn guadar
      document.getElementById("btn_save").addEventListener('click', function(){
            //recupero la info del form
            const datos= new FormData(formulario);
            console.log(datos);
            console.log(formulario.title.value);
            console.log(formulario.description.value);

            axios.post("http://localhost/pajaroneta/public/eventos/agregar", datos)
            .then(
                (respuesta)=>{
                $("#event").modal("hide");
            }
            )
            .catch((error) => {
            console.error('Error en la solicitud:', error);

        if (error.response) {
            console.error('Respuesta del servidor:', error.response.data);
            // Muestra mensajes de error al usuario si es necesario
        } else if (error.request) {
            console.error('No se recibió respuesta del servidor');
        } else {
            console.error('Error durante la solicitud:', error.message);
        }
    });

      });


    });

  </script>

@endsection


