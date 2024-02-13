<?php $__env->startSection('titulo'); ?>
Crear nueva Ubicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">

    <form action="<?php echo e(route('ubicaciones.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="province">Provincia:</label>
                <input class="form-control"  type="text" id="province" name="province" placeholder="Provincia" required>
            </div>

            <div class="form-group">
                <label for="city">Ciudad:</label>
                <input class="form-control" type="text" id="city" name="city" placeholder="Ciudad" required>
            </div>

            <div class="form-group">
                <label for="address">Dirección:</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Dirección" required>
            </div>

            <div class="form-group">
                <label for="url">Url:</label>
                <input class="form-control"  type="text" id="url" name="url" placeholder="Dirección en Google maps" required>
            </div>

            <div class="form-group">
                <label for="cp">Código postal:</label>
                <input class="form-control" type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
            </div>

            <input class="btn btn-primary" type="submit" name="" id="" value="Crear ubicación">

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/locations/create.blade.php ENDPATH**/ ?>