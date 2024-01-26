

<?php $__env->startSection('titulo'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

img{
    width: 200px;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <th scope="row"><?php echo e($category->id); ?></th>
    <td><?php echo e($category->name); ?></td>
    <td><img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>"></td>
    <td><form action="<?php echo e(route('categorias.destroy', $category->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit">Borrar</button>
    </form></td>
    <td><form action="<?php echo e(route('categorias.edit', $category->id)); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <button type="submit">Editar</button>
    </form></td>

</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/categories/index.blade.php ENDPATH**/ ?>