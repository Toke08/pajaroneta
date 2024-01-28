<?php $__env->startSection('titulo'); ?>
 ver roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>ver roles</h1>
<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <th scope="row"><?php echo e($role->id); ?></th>
    <td><?php echo e($role->name); ?></td>
    <td><form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit">Borrar</button>
    </form></td>
    <td><form action="<?php echo e(route('roles.edit', $role->id)); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <button type="submit">Editar</button>
    </form></td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/roles/index.blade.php ENDPATH**/ ?>