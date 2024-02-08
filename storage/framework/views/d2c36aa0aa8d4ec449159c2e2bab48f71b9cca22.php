<?php $__env->startSection('titulo'); ?>
Nuevo evento
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style></style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nuevo evento</h1>

    <form action="<?php echo e(route('eventos.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="ubi_for">
            <input type="text" id="title" name="title" placeholder="Nombre del evento" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="description" name="description" placeholder="Descripción del evento" required>
        </div>
       <div class="ubi_btn">
            <input type="submit" name="" id="" value="Crear evento">
       </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/events/create.blade.php ENDPATH**/ ?>