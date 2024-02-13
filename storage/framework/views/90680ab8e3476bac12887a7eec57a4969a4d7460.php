<?php $__env->startSection('titulo'); ?>
Crear nuevo evento
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">
    <form action="<?php echo e(route('evento.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">

                <div class="form-group">
                    <label for="title">Nombre evento:</label>
                    <input  class="form-control" type="text" id="title" name="title" placeholder="Nombre del evento" required>
                </div>


                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <textarea class="form-control" type="text" id="description" name="description" placeholder="Descripción del evento" required></textarea>
                </div>


                <div class="form-group" style="display: none;">
                    <label for="start">Fecha de inicio:</label>
                    <input class="form-control" type="hidden" id="start" name="start" value="<?php echo e(request()->input('selected_date')); ?>" readonly>
                </div>


            <div class="form-group">
                <label for="end">Fecha de fin:</label>
                <input class="form-control" type="datetime-local" id="end" name="end" required>
            </div>

            <div class="form-group">
                <label for="id_location">Ubicación:</label>
                <select class="form-control" id="id_location" name="id_location" required>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($location->id); ?>"><?php echo e($location->address); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>


            <input class="btn btn-primary"type="submit" value="Crear evento">

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var startDateInput = document.getElementById('start');
        var selectedDate = '<?php echo e($selectedDate); ?>';
        var formattedDate = selectedDate.replace(' ', 'T');

        startDateInput.value = formattedDate;

        startDateInput.readOnly = true;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/evento/create.blade.php ENDPATH**/ ?>