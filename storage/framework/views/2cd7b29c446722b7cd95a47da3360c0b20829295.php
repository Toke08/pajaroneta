<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<table>
    <h1>Lista de categorías blog</h1>
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nombre de categoría</th>
            <th scope="col">Acción</th>
        </thead>
        <tbody>
        <div class="foods-container">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($tag->id); ?></th>
                <td><a href="tags/<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></a></td>
                <form action="<?php echo e(route('tags.destroy', $tag->id)); ?>"   method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <td><button type="submit">Borrar</button></td>
                </form>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </div>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/tags/index.blade.php ENDPATH**/ ?>