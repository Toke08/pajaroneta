<?php $__env->startSection('titulo'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <a class="nav-link" href="<?php echo e(route('blog.create')); ?>"><?php echo app('translator')->get('Create Post'); ?></a>


    <a class="nav-link" href="<?php echo e(route('tags.index')); ?>"><?php echo app('translator')->get('View Blog Categories'); ?></a>


    <a class="nav-link" href="<?php echo e(route('tags.create')); ?>"><?php echo app('translator')->get('Create Blog Category'); ?></a>


    <a class="nav-link" href="<?php echo e(route('restaurants.create')); ?>"><?php echo app('translator')->get('New Restaurant'); ?></a>


    <a class="nav-link" href="<?php echo e(route('restaurants.index')); ?>"><?php echo app('translator')->get('View Restaurants'); ?></a>

    <a class="nav-link" href="<?php echo e(route('galeria-comidas.create')); ?>"><?php echo app('translator')->get('Create comida'); ?></a>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>