
<?php $__env->startSection('contenido'); ?>
<?php $__env->startSection('titulo'); ?>
Vista de burguer
<?php $__env->stopSection(); ?>
    <h1><?php echo e($food->name); ?></h1>
    <p>precio <?php echo e($food->price); ?></p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/foods/show.blade.php ENDPATH**/ ?>