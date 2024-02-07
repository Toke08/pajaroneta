<?php $__env->startSection('titulo'); ?>
Nueva fecha
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva fecha</h1>

<form action="<?php echo e(route('calendario.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <label for="date">
        <input type="date" name="date" id="date">
    </label>

    <label for="event">Evento:</label>
    <select id="event" name="event_id" required>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($event->id); ?>"><?php echo e($event->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label for="location">Ubicación:</label>
    <select id="location" name="location_id" required>
        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($location->id); ?>"><?php echo e($location->city); ?>, <?php echo e($location->address); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit">Guardar</button>
</form>




















<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/admin/calendar/create.blade.php ENDPATH**/ ?>