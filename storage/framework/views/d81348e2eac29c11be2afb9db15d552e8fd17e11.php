

<?php $__env->startSection('titulo'); ?>
    Galeria de comidas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>




</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <h1>Galeria de comidas</h1>

    <table class="table">
  <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">precio</th>
            <th scope="col">imagen</th>
            <th scope="col">descripcion</th>
            <th scope="col">categoria</th>
            <th scope="col">Acciones</th>
        </tr>
  </thead>
  <tbody>


        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($food->id); ?></th>
            <td><a href="<?php echo e(route('galeria-comidas.show', ['id' => $food->id])); ?>"><?php echo e($food->name); ?></a></td>
            <td><?php echo e($food->price); ?></td>
            <td><img src="<?php echo e(asset('img/foods/'.$food->img)); ?>"></td>
            <td><?php echo e($food->description); ?></td>
            <td><?php echo e($food->category->name); ?></td>
            <td>
                <form action="<?php echo e(route('galeria-comidas.edit', $food->id)); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Editar</button>
                </form>

                <form action="<?php echo e(route('galeria-comidas.destroy', $food->id)); ?>"   method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    </table>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/foods/index.blade.php ENDPATH**/ ?>