<?php $__env->startSection('titulo'); ?>
Calendario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
#mapa{
    margin-top: 5%;
    margin-bottom: 5%;
}
#calendario{
    z-index: 1;
}
iframe{
    width: 100%;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div id="caja_info"></div>

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
                <label for="event">Nombre del evento:</label>
                    <select id= "event" name="event_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option id="title" name="title" value="<?php echo e($event->id); ?>"><?php echo e($event->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="location">¿Donde se ubicará?</label>
                        <select id="location" name="location_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>"><?php echo e($location->city); ?>, <?php echo e($location->address); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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


        dateClick:function(info){  //la info recoge el día que haces click

            formulario.reset();
            formulario.start.value=info.dateStr; //pilla la fecha elegida del calendario
            // formulario.start.value=info.dateStr;

            $("#calendar").modal("show"); //al hacer click en la fecha que salga el modal evento jjejjej
        },


        eventClick:function(info){

            var event=info.event;

            axios.post("http://localhost/pajaroneta/public/eventos/editar/"+info.event.id)
            .then(
                (respuesta)=>{
                formulario.title.value=respuesta.data.title;
                formulario.description.value=respuesta.data.description;
                formulario.start.value=respuesta.data.start;
                formulario.end.value=respuesta.data.end;
                $("#calendar").modal("show");
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

    function cargarEventosDesdeBD(dateStr) {
    axios.get("http://localhost/pajaroneta/public/eventos?fecha=" + dateStr)
        .then(function (response) {
            console.log('Respuesta de la base de datos:', response.data);

            // Resto del código...
        })
        .catch(function (error) {
            console.error('Error al cargar eventos desde la base de datos:', error);
        });
}



document.getElementById('btn_save').addEventListener('click', function (event) {
    event.preventDefault();

    axios.post("http://localhost/pajaroneta/public/eventos", {
        title: formulario.title.value,
        start: formulario.start.value,
        end: formulario.end.value
    })
    .then(function (response) {
        // Agrega el nuevo evento al calendario
        calendar.addEvent({
            title: formulario.title.value,
            start: formulario.start.value,
            end: formulario.end.value
        });

        // Actualiza el calendario
        calendar.refetchEvents();

        // Cerrar el modal
        $("#calendar").modal("hide");
    })
    .catch(function (error) {
        console.error('Error al guardar el evento en la base de datos:', error);
    });
});





    //   document.getElementById("btn_save").addEventListener('click', function(){
    //     const datos= new FormData(formulario);
    //     let url="http://localhost/pajaroneta/public/admin/calendario";
    //         axios.post(url, datos)
    //         .then(

    //             (respuesta)=>{

    //             calendar.refetchEvents(); //esto saca los eventos actualizando de forma automática
    //             $("#event").modal("hide");
    //         }
    //         )
    //         .catch((error) => {
    //         console.error('Error en la solicitud:', error);

    //         if (error.response) {
    //         console.error('Respuesta del servidor:', error.response.data);
    //         // Muestra mensajes de error al usuario si es necesario
    //         } else if (error.request) {
    //         console.error('No se recibió respuesta del servidor');
    //         } else {
    //         console.error('Error durante la solicitud:', error.message);
    //         }
    //         });
    //   });

    //   document.getElementById("btn_delete").addEventListener('click', function(){

    //     url="http://localhost/pajaroneta/public/admin/calendario"+event.id;

    //     const datos= new FormData(formulario);
    //         axios.post(url, datos)
    //         .then(
    //             (respuesta)=>{
    //             //esto saca los eventos actualizando de forma automática
    //             calendar.refetchEvents();
    //             $("#event").modal("hide");
    //         }
    //         )
    //         .catch((error) => {
    //         console.error('Error en la solicitud:', error);

    //         if (error.response) {
    //         console.error('Respuesta del servidor:', error.response.data);
    //         // Muestra mensajes de error al usuario si es necesario
    //         } else if (error.request) {
    //         console.error('No se recibió respuesta del servidor');
    //         } else {
    //         console.error('Error durante la solicitud:', error.message);
    //         }
    //         });
    // });



    // function enviarDatos(url){
    //     const datos= new FormData(formulario);
    //         axios.post(url, datos)
    //         .then(
    //             (respuesta)=>{
    //             //esto saca los eventos actualizando de forma automática
    //             calendar.refetchEvents();
    //             $("#event").modal("hide");
    //         }
    //         )
    //         .catch((error) => {
    //         console.error('Error en la solicitud:', error);

    //         if (error.response) {
    //         console.error('Respuesta del servidor:', error.response.data);
    //         // Muestra mensajes de error al usuario si es necesario
    //         } else if (error.request) {
    //         console.error('No se recibió respuesta del servidor');
    //         } else {
    //         console.error('Error durante la solicitud:', error.message);
    //         }
    //         });
    // }

});
</script>



<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/calendar/index.blade.php ENDPATH**/ ?>