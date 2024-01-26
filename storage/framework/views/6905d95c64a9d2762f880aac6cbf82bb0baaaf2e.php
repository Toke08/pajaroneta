<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>">
    <h1><?php echo e($post->title); ?></h1>
    <a href=""><?php echo e($post->tag->name); ?></a>
    <p><?php echo e($post->content); ?></p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/blog/show.blade.php ENDPATH**/ ?>