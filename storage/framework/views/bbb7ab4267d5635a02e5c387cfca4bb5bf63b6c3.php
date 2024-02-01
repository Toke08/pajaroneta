
<?php $__env->startSection('titulo'); ?>
Ubicación nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva ubicación</h1>

    <form action="<?php echo e(route('ubicaciones.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label for="name">Dirección:</label>
        <input type="text" id="address" name="address" required>
        <br>
        <label for="image">Provincia</label>
        <input type="text" id="province" name="province" required>
        <br>
        <label for="image">Cuidad:</label>
        <input type="text" id="city" name="city" required>
        <br>
        <label for="image">Código postal</label>
        <input type="text" inputmode="numeric" id="cp" name="cp" required>
        <br>
        <input type="submit" name="" id="" value="Crear ubicación">
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/locations/create.blade.php ENDPATH**/ ?>