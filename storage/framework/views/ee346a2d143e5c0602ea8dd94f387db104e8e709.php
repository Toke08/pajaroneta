

<?php $__env->startSection('titulo'); ?>
    Galeria de comidas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Calendario</h1>

<table class="table table-bordered table-striped">
    <thead class="thead-dark"> <!-- Añade un fondo oscuro al encabezado de la tabla -->
        <tr>
            <th>Fecha</th>
            <th>Evento</th>
            <th>Ubicación</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $calendars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calendar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($calendar->date); ?></td>
                <td><?php echo e($calendar->event->name); ?></td>
                <td><?php echo e($calendar->location->city); ?>, <?php echo e($calendar->location->address); ?></td>
                <td>
                    <form action="<?php echo e(route('calendario.destroy', $calendar->id)); ?>"   method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/calendar/index.blade.php ENDPATH**/ ?>