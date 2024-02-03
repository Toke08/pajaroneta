
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
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <button type="submit">Crear Evento</button>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/admin/events/create.blade.php ENDPATH**/ ?>