<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva ubicación</h1>

    <form action="<?php echo e(route('ubicaciones.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="ubi_for">
            <input type="text" id="province" name="province" placeholder="Provincia" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="city" name="city" placeholder="Ciudad" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="address" name="address" placeholder="Dirección" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="url" name="url" placeholder="Dirección en Google maps" required>
        </div>

        <div class="ubi_for">
            <input type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
        </div>

       <div class="ubi_btn">
            <input type="submit" name="" id="" value="Crear ubicación">
       </div>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/locations/create.blade.php ENDPATH**/ ?>