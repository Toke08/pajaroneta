<?php $__env->startSection('titulo'); ?>
Ubicación nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva fecha</h1>
<div id="calendario"></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evento">
    Añadir evento
    </button>

    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea un evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('eventos.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <button type="submit">Crear Evento</button>
            </form>

        </div>
        
      </div>
    </div>
  </div>



    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubicacion">
    Añadir Ubicación
    </button>

    <!-- Modal -->
    <div class="modal fade" id="ubicacion" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Crea una ubicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?php echo e(route('ubicaciones.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="ubi_for">
                    <input type="text" id="address" name="address" placeholder="Dirección" required>
                </div>

                <div class="ubi_for">
                    <input type="text" id="province" name="province" placeholder="Provincia" required>
                </div>
               <div class="ubi_for">
                    <input type="text" id="city" name="city" placeholder="Ciudad" required>
               </div>
               <div class="ubi_for">
                    <input type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
               </div>
               <div class="ubi_btn">
                    <input type="submit" name="" id="" value="Crear ubicación">
               </div>

            </form>

        </div>
        
      </div>
    </div>
  </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendario');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'

    });
      calendar.render();
    });

  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/calendar/create.blade.php ENDPATH**/ ?>