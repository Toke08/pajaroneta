<?php $__env->startSection('titulo'); ?>
Calendario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div id="calendar"></div>
<h2>Eventos asignados</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Ubicación</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event->id); ?></td>
                <td><?php echo e($event->title); ?></td>
                <td><?php echo e($event->description); ?></td>
                <td><?php echo e($event->start); ?></td>
                <td><?php echo e($event->end); ?></td>
                <td><?php echo e($event->location ? $event->location->address : 'N/A'); ?></td>
                <td>
                    <form action="<?php echo e(route('evento.destroy', $event->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($events->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    // Redireccionar a la página de creación de eventos
                    window.location.href = "<?php echo e(route('evento.create')); ?>?selected_date=" + info.dateStr;
                },
            });
            calendar.render();
        });
      </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/fullcalendar/index.blade.php ENDPATH**/ ?>