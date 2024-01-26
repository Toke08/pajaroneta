<?php $__env->startSection('titulo'); ?>
<?php $__env->startSection('contenido'); ?>
<?php $__env->stopSection(); ?>
<h1><?php echo e($tag->name); ?></h1>
    <p>Esta es la vista en detalle del <?php echo e($tag->name); ?></p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/tags/show.blade.php ENDPATH**/ ?>