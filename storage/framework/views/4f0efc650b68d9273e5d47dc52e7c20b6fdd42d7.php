

<?php $__env->startSection('titulo'); ?>
Eventos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
a {
  text-decoration: none;
}


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Próximos eventos</h1>
<div
    ><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <h1>Fecha</h1>
            <p><?php echo e($event->date); ?></p>
        </div>
        <div>
            <h2>Info general</h2>
            <p><?php echo e($event->name); ?></p>
            <p><?php echo e($event->description); ?></p>
            <p><?php echo e($location->id->city); ?></p>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/events/index.blade.php ENDPATH**/ ?>