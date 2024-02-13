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


    <div>
        <iframe src="https://maps.app.goo.gl/V8Y61jAg3XPxXYED7" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/encuentranos_show.blade.php ENDPATH**/ ?>