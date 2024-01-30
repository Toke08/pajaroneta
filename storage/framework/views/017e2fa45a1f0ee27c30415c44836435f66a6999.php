<?php $__env->startSection('titulo'); ?>
Ubicaciones
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Estas son tus ubicaciones que usarás para asignar a tus eventos</h1>
<table class="table">
    <thead class="thead-dark">
        <th scope="col">Dirección</th>
        <th scope="col">Provincia</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Código postal</th>

        <th scope="col">Eliminar</th>
        <th scope="col">Editar</th>
    </thead>
    <tbody>
        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            
            <td><?php echo e($location->address); ?></a></td>
            <td><?php echo e($location->province); ?> </a></td>
            <td><?php echo e($location->city); ?></a></td>
            <td><?php echo e($location->cp); ?></a></td>

            <form action="<?php echo e(route('ubicaciones.destroy', $location->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <td><button type="button" class="btn-delete" data-location-id="<?php echo e($location->id); ?>">Eliminar</button></td>
            </form>
                <form action="<?php echo e(route('ubicaciones.edit', $location->id)); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <td><button type="submit">Editar</button></td>
            </form>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<script>
     const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const locationId = this.getAttribute('data-location-id');
        const mensaje = confirm("¿Deseas eliminar esta ubicación? Se borrarán los eventos relacionados con dicha información");

        if (mensaje) {
        }
    });
});
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ1\www\pajaroneta\resources\views/locations/index.blade.php ENDPATH**/ ?>