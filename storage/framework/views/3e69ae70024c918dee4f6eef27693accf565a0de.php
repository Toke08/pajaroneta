

<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Tus ubicaciones</h1>
<p>Estas son tus ubicaciones que usarás para asignar a tus eventos</p>
<a href="<?php echo e(route('ubicaciones.create')); ?>" class="btn btn-primary">Crear nueva ubicación</a>

<div id="ubicaciones">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Provincia</th>
                <th>Ciudad</th>
                <th>Código postal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($location->id); ?></td>
                <td><?php echo e($location->address); ?></td>
                <td><?php echo e($location->province); ?></td>
                <td><?php echo e($location->city); ?></td>
                <td><?php echo e($location->cp); ?></td>
                <td>
                    <!-- Botón para eliminar -->
                    <form action="<?php echo e(route('ubicaciones.destroy', $location->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/locations/index.blade.php ENDPATH**/ ?>