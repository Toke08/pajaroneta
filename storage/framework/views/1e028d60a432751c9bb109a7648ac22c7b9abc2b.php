<?php $__env->startSection('titulo'); ?>
Crear rol nuevo
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Crear rol nuevo</h1>


    <form action="<?php echo e(route('roles.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <input type="submit" value="Enviar">



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/roles/create.blade.php ENDPATH**/ ?>