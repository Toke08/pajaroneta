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

<h1>Estas son los eventos creados</h1>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha del evento</th>
        <th scope="col">Dirección</th>
        <th scope="col">Acciones</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($event->name); ?></td>
            <td><?php echo e($event->description); ?></td>
            <td><?php echo e($event->date); ?></td>

            <td><?php echo e($event->location->address); ?></td>

        <form action="<?php echo e(route('eventos.destroy', $event->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <td><button type="submit">Eliminar</button></td>
        </form>
        <form action="<?php echo e(route('eventos.update', $event->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <td><button type="submit">Editar</button></td>
        </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    </tbody>
</table>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/events/index.blade.php ENDPATH**/ ?>