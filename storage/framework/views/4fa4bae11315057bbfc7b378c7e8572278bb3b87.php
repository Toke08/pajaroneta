<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
#tablaEventos{
    margin-top: 5%
}
iframe{
    border-radius:1.5em;
    box-shadow: 2px 4px 20px -3px rgba(0,0,0,0.54);
}
.caj{
    background-color:#730000;
    color: white;
    border-radius: 1.5em;
    padding: 3%;
    width:45%;
    margin-top: 3%;
    margin-bottom: 3%;
    box-shadow: 2px 4px 20px -3px rgba(0,0,0,0.54);
}
.caj p{
    font-size:1.2em;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1><?php echo app('translator')->get("Today we will be..."); ?></h1>
<?php if(!is_null($url)): ?>
<div class="caj">
    <p><?php echo app('translator')->get("Today we are at the event"); ?>: <?php echo e($title); ?></p>
    <p><?php echo app('translator')->get("Find us at"); ?>: <?php echo e($address); ?></p>
</div>

    <div>
        <iframe src="<?php echo e($url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
<?php else: ?>
<p><?php echo app('translator')->get("There are no events for today"); ?>
</p>
<?php endif; ?>

<div id="tablaEventos">
    <h2><?php echo app('translator')->get("Next events"); ?></h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Ubicación</th>
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

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/encuentranos_show.blade.php ENDPATH**/ ?>