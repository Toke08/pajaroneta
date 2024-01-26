<?php $__env->startSection('titulo'); ?>
Crear categoria nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Crear categoria nueva</h1>


    <form action="<?php echo e(route('categorias.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="image">Imagen actual:</label><br>
        <?php if(<?php echo e($category->img); ?>==null): ?>
    <img src="<?php echo e(asset('img/categories/' . $category->img)); ?>" style="max-width: 200px;">
<?php else: ?>
    <img src=" asset('img/categories/categorydefaultimg.png') " style="max-width: 200px;">
<?php endif; ?>
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Enviar">



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/categories/create.blade.php ENDPATH**/ ?>