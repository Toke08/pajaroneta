<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <h2>Publicaciones relacionadas con <?php echo e($tag->name); ?></h2>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>

            <p><?php echo e($post->content); ?></p>
            <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>">
            <strong><?php echo e($post->title); ?></strong>
            <br>
            <!--<strong>Categorías</strong> <p><?php echo e($post->tag_id); ?></p>-->
            <a href="../blog/<?php echo e($post->id); ?>">Leer más...</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/tags/show.blade.php ENDPATH**/ ?>