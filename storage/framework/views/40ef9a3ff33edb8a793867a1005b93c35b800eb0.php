
<?php $__env->startSection('titulo'); ?>
Evento nuevo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva evento</h1>

    <form action="<?php echo e(route('eventos.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Descripción:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <label for="image">Fecha evento:</label>
        <input type="date" id="date" name="date" required>
        <br>
        <label for="">Dirección</label>

        <select id="location_id" name="location_id" >
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($location->id); ?>"><?php echo e($location->address); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
        <br>
        <input type="Submit" value="Crear evento">
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\uni_server\UniServerZ\www\pajaroneta\resources\views/events/create.blade.php ENDPATH**/ ?>