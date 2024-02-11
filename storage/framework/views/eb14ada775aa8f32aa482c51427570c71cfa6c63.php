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
    max-width: 100vh;
}
iframe{
    width: 100%;
}

/* para el modal */


#btn_save{
    background-color:#E5A200;
    border: none;
    border-radius: 1.5em;
    padding: 2%;
    width: 7em;

}
#btn_save:hover{
    background-color:#CA8F00;
}


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>


<div id="calendario"></div>


    
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
                    <small id="" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <div class="form-group">
                    <label for="end">Fecha de fin</label>
                    <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId">
                    <small id="" class="form-text text-muted"> Este campo es requerido</small>
                </div>
                <button id="btn_save" type="submit">Guardar</button>
            </form>

        </div>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>

document.addEventListener('DOMContentLoaded', function() {
    // recoge los datos del form jquery
    let formulario = document.querySelector("form");
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es", //idioma español
        displayEventTime: false,

        dateClick: function(info) {
            formulario.reset(); //reseteo form
            formulario.start.value = info.dateStr; //pilla la fecha elegida del calendario
            $("#calendar").modal("show"); //al hacer clic en la fecha que salga el modal evento jeje
        },
    });

    // Agrega el evento click al botón después de inicializar el calendario
    document.getElementById("btn_save").addEventListener("click", function() {
        let formData = new FormData(formulario);

        $.ajax({
            type: 'POST',
            url: '<?php echo e(route('calendario.store')); ?>',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                // Actualiza el calendario con los nuevos datos
                calendar.refetch();
                // Cierra el modal después de guardar
                $("#calendar").modal("hide");
            },
            error: function(error) {
                // Maneja los errores si es necesario
                console.log(error);
            }
        });
    });


    calendar.render();
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/calendar/index.blade.php ENDPATH**/ ?>