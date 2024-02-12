

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
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.5165004228597!2d-2.9419887246831182!3d43.26155407767463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e502842c84087%3A0x539b319a98f8cfbe!2sC.%20del%20Lic.%20Poza%2C%2031%2C%20Abando%2C%2048011%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1707666740981!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div id="calendario"></div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: "es", // idioma español
    });
    calendar.render();
});

</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/calendar.blade.php ENDPATH**/ ?>