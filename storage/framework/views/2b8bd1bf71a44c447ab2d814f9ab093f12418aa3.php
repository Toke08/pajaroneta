<?php $__env->startSection('titulo'); ?>
    Crear publicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">
    <form action="<?php echo e(route('tags.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre de la Categoría:</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>
            <button class="btn btn-primary" type="submit">Guardar Categoría</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/tags/create.blade.php ENDPATH**/ ?>