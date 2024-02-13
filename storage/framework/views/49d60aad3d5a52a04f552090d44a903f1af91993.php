<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
#tablaEventos{
    margin-top: 5%
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<?php if(!is_null($url)): ?>
<h1><?php echo app('translator')->get('Today we are at the event <?php echo e($title); ?>'); ?></h1>
<h3><?php echo app('translator')->get('Find us at <?php echo e($address); ?>'); ?></h3>
    <div>
        <iframe src="<?php echo e($url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<?php else: ?>
<p><?php echo app('translator')->get('There are no scheduled events for today.'); ?></p>
<?php endif; ?>

<div id="tablaEventos">
    <h2><?php echo app('translator')->get('Upcoming events'); ?></h2>
    <table class="table">
        <thead>
            <tr>
                <th><?php echo app('translator')->get('Title'); ?></th>
                <th><?php echo app('translator')->get('Description'); ?></th>
                <th><?php echo app('translator')->get('Start'); ?></th>
                <th><?php echo app('translator')->get('End'); ?></th>
                <th><?php echo app('translator')->get('Location'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event->title); ?></td>
                <td><?php echo e($event->description); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($event->start)->format('Y-m-d')); ?></td>
                <td><?php echo e(Carbon\Carbon::parse($event->end)->format('Y-m-d')); ?></td>
                <td><?php echo e($event->location->address); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/encuentranos_show.blade.php ENDPATH**/ ?>