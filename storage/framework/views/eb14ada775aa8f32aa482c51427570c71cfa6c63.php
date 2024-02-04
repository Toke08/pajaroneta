<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Calendario</h1>
<div id="calendario"></div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendario');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'

    });
      calendar.render();
    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/calendar/index.blade.php ENDPATH**/ ?>