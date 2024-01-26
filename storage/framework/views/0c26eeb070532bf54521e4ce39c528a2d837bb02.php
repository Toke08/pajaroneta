
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <h2>Datos del Formulario</h2>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <strong>Título:</strong> <p><?php echo e($post->title); ?></p>

            <strong>Contenido:</strong> <p><?php echo e($post->content); ?></p>

            <img src="<?php echo e(asset('img/post')); ?>/<?php echo e($post->img); ?>"><img>

            <strong>Tagname:</strong> <p><?php echo e($post->tag_id); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/blog/index.blade.php ENDPATH**/ ?>