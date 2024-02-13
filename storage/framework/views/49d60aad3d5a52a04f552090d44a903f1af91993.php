<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
#calendario {
    position: relative;
    z-index: 0; /* Ajusta el valor según sea necesario */
    margin-top: 5%;
    margin-bottom: 5%
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Hoy nos encontramos aquí...</h1>

    <?php if(!is_null($url)): ?>
    <div>
        <iframe src="<?php echo e($url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        <?php else: ?>
        <p>No hay eventos programados para hoy.</p>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/encuentranos_show.blade.php ENDPATH**/ ?>