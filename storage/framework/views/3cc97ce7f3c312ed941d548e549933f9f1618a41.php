
<?php $__env->startSection('titulo'); ?>
    Crear publicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Formulario de Ingreso de Nueva Categoría</h1>

<form action="<?php echo e(route('tags.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="name">Nombre de la Categoría:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <button type="submit">Guardar Categoría</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\uni_server\UniServerZ\www\pajaroneta\resources\views/tags/create.blade.php ENDPATH**/ ?>