<?php $__env->startSection('titulo'); ?>
Tags
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<a href="<?php echo e(route('adminHome')); ?>">Volver al panel de administrador</a>
    <h1>Lista de categorías blog</h1>

    <?php if(count($tags) > 0): ?>
        <table>
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Nombre de categoría</th>
                <th scope="col">Acción</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($tag->id); ?></th>
                        <td><a href="<?php echo e(route('tags.show', $tag)); ?>"><?php echo e($tag->name); ?></a></td>

                        <td>
                            <form action="<?php echo e(route('tags.destroy', $tag->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <strong>No hay categorías disponibles.</strong>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/tags/index.blade.php ENDPATH**/ ?>