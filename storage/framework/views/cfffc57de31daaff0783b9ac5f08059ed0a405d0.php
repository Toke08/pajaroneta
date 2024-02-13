<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Nuevo evento</h1>

<form action="<?php echo e(route('evento.store')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="ubi_for">
        <input type="text" id="title" name="title" placeholder="Nombre del evento" required>
    </div>

    <div class="ubi_for">
        <input type="text" id="description" name="description" placeholder="Descripción del evento" required>
    </div>

    <div class="ubi_for" style="display: none;">
        <label for="start">Fecha de inicio:</label>
        <input type="hidden" id="start" name="start" value="<?php echo e(request()->input('selected_date')); ?>" readonly>
    </div>

    <div class="ubi_for">
        <label for="end">Fecha de fin:</label>
        <input type="datetime-local" id="end" name="end" required>
    </div>

    <div class="ubi_for">
        <label for="id_location">Ubicación:</label>
        <select id="id_location" name="id_location" required>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($location->id); ?>"><?php echo e($location->address); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="ubi_btn">
        <input type="submit" value="Crear evento">
    </div>
</form>
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

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/evento/create.blade.php ENDPATH**/ ?>