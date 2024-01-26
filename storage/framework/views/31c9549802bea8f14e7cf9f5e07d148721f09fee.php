
<?php $__env->startSection('contenido'); ?>
<?php $__env->startSection('titulo'); ?>
Editar categoria
<?php $__env->stopSection(); ?>
    <h1>Editar categoria</h1>
    <p><?php echo e($category->id); ?>.<?php echo e($category->name); ?></p>
    <img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>">
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/categories/show.blade.php ENDPATH**/ ?>