<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>">
    <h1><?php echo e($post->title); ?></h1>
    <a href="<?php echo e(route('tags.show', $post->tag)); ?>"><?php echo e($post->tag->name); ?></a><br>
    <p><?php echo e($post->content); ?></p>
    <a href="<?php echo e(route('blog.index')); ?>" >Volver al blog</a>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/blog/show.blade.php ENDPATH**/ ?>