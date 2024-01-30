
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<table>
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
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
    <strong>No hay categorías disponibles.</strong>
<?php endif; ?>
    </div>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/tags/index.blade.php ENDPATH**/ ?>