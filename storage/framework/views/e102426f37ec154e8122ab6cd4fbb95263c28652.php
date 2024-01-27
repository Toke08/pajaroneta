<?php $__env->startSection('titulo'); ?>
Eventos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Estas son los eventos creados</h1>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha del evento</th>
        
    </thead>
    <tbody>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><a href="event/<?php echo e($event->name); ?>"><?php echo e($event->name); ?></a></td>
            <td><a href="event/<?php echo e($event->description); ?>"><?php echo e($event->description); ?> </a></td>
            <td><a href="event/<?php echo e($event->date); ?>"><?php echo e($event->date); ?></a></td>
            
            <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST">
                <td><input type="button" value="Eliminar"></td>
                <td><input type="button" value="Editar"></td>
            </form>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\uni_server\UniServerZ\www\pajaroneta\resources\views/events/index.blade.php ENDPATH**/ ?>