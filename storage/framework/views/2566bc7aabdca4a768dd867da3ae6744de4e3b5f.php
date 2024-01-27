<?php $__env->startSection('titulo'); ?>
    Crear comida nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <h1>Editar publicación</h1>

    <form action="<?php echo e(route('blog.update', $post->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?php echo e($post->title); ?>" required>
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen:</label><br>
        <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>" style="max-width: 200px;"><br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/blog/edit.blade.php ENDPATH**/ ?>