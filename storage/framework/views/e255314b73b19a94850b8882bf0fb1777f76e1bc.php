
<?php $__env->startSection('titulo'); ?>
Editar categoria
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <h1>Editar categoria</h1>

    <form action="<?php echo e(route('categorias.update', $category->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="<?php echo e($category->name); ?>" required>
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen actual:</label><br>
        <img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>" style="max-width: 200px;"><br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>