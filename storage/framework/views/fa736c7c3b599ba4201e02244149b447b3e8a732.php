<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Calendario</h1>
<div id="calendario"></div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calendar">
    Añadir fecha
    </button>
    <div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Fecha nueva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('calendario.store')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="date">Fecha</label>
                    <input type="date" name="date" id="date">
                </div>

                <div class="form-group">
                <label for="event">Evento:</label>
                    <select id= "event" name="event_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option selected>Salida Libre</option>
                            <option id="title" name="title" value="<?php echo e($event->id); ?>"><?php echo e($event->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">Ubicación:</label>
                        <select id="location" name="location_id" required>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>"><?php echo e($location->city); ?>, <?php echo e($location->address); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                </div>
                <button type="submit">Guardar</button>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn_save">Guardar</button>
            <button type="button" class="btn btn-danger" id="btn_delete">Eliminar</button>
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

        console.log(formulario.title.value);

        var calendarEl = document.getElementById('calendario');
        var calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',

        locale:"es", //idioma español
        displayEventTime:false,
        events:"http://localhost/pajaroneta/public/eventos/mostrar",

        dateClick:function(info){  //la info recoge el día que haces click

            formulario.reset();
            // formulario.start.value=info.dateStr;
            // formulario.start.value=info.dateStr;

            $("#calendar").modal("show"); //al hacer click en la fecha que salga el modal evento jjejjej
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



<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/admin/calendar/index.blade.php ENDPATH**/ ?>