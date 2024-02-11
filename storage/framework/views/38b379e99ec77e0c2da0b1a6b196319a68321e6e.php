
<?php $__env->startSection('titulo'); ?>
Editar ubicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <h1>Editar ubicación</h1>

    <form action="<?php echo e(route('ubicaciones.update', $location->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" value="<?php echo e($location->address); ?>" required>
        <br>
        <label for="address">Provincia:</label>
        <input type="text" id="province" name="province" value="<?php echo e($location->province); ?>" required>
        <br>
        <label for="address">Cuidad:</label>
        <input type="text" id="city" name="city" value="<?php echo e($location->city); ?>" required>
        <br>
        <label for="address">Código postal:</label>
        <input type="text" id="cp" name="cp" value="<?php echo e($location->cp); ?>" required>
        <br>
        <button type="submit">Actualizar</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/locations/edit.blade.php ENDPATH**/ ?>