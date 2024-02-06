<?php $__env->startSection('titulo'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style></style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Calendario</h1>
<div id="calendario"></div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#event">
    Añadir evento
    </button>
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Datos del evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">

                <?php echo csrf_field(); ?>
                <!-- <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId">
                </div> -->

                <div class="form-group">
                    <label for="title">Nombre del evento</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea  class="form-control" name="description" id="description" rows="3"></textarea>
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="start">Fecha de inicio</label>
                    <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="end">Fecha de fin</label>
                    <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId">
                    <small id="helpId" class="form-text text-muted"> Este campo es requerido</small>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        // recoge los datos del form jquery
        let formulario=document.querySelector("form");



        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',


        locale:"es", //idioma español
        displayEventTime:false,
        events:"http://localhost/pajaroneta/public/eventos/mostrar",

        dateClick:function(info){  //la info recoge el día que haces click
            formulario.reset();

            formulario.start.value=info.dateStr;
            // formulario.start.value=info.dateStr;

            $("#event").modal("show"); //al hacer click en la fecha que salga el modal evento jjejjej
        },
        eventClick:function(info){
            var event=info.event;
            // console.log(event);

            axios.post("http://localhost/pajaroneta/public/eventos/editar/"+info.event.id)
            .then(
                (respuesta)=>{
                formulario.title.value=respuesta.data.title;
                formulario.description.value=respuesta.data.description;
                formulario.start.value=respuesta.data.start;
                formulario.end.value=respuesta.data.end;
                $("#event").modal("show");
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

    }

    });
      calendar.render();

      //capturo la accion del btn guadar
      document.getElementById("btn_save").addEventListener('click', function(){
        enviarDatos("http://localhost/pajaroneta/public/eventos/agregar");
      });
      //eliminar eventos
      document.getElementById("btn_delete").addEventListener('click', function(){

        url="http://localhost/pajaroneta/public/eventos/borrar/"+event.id;

        const datos= new FormData(formulario);




            axios.post(url, datos)
            .then(
                (respuesta)=>{
                //esto saca los eventos actualizando de forma automática
                calendar.refetchEvents();
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

    function enviarDatos(url){
        const datos= new FormData(formulario);
            axios.post(url, datos)
            .then(
                (respuesta)=>{
                //esto saca los eventos actualizando de forma automática
                calendar.refetchEvents();
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
    }

});

  </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/events/index.blade.php ENDPATH**/ ?>