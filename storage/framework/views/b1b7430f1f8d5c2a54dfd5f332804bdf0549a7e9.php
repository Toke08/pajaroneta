<?php $__env->startSection('titulo'); ?>
Eventos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('estilos'); ?>
<style>
h1{
    font-family: 'Quicksand', sans-serif;

}
#eventos{
    display: flex;
    flex-direction: column;
    border: 2px solid #000000;
    border-radius: 10px;
    font-family: 'Quicksand', sans-serif;

}
.event_title{
    background-color:#A62224;
    color: #ffffff;
    display: flex;
    flex-direction:row;
    border-bottom: 2px solid #000000;
}
label, p{
    width: 30%;
    margin:2%
}
.event_info{
    color: #000000;
    display: flex;
    flex-direction:row;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Próximos eventos</h1>
<div id="eventos">
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="event_title">
            <label>Fecha</label>
            <label>Nombre</label>
            <label>Descripción</label>
        </div>
        <div class="event_info">
            <p><?php echo e($event->date); ?></p>
            <p><?php echo e($event->name); ?></p>
            <p><?php echo e($event->description); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>





<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/events/index.blade.php ENDPATH**/ ?>