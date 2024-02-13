<?php $__env->startSection('titulo'); ?>
Categorias
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
    table td img {
        width: 100px;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>imagen</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($categories)<=0): ?> <tr>
                <td colspan="4">No hay registros disponibles.</td>
                </tr>
                <?php else: ?>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><?php echo e($category->id); ?></th>
                    <td><?php echo e($category->name); ?></td>
                    <td><img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>"></td>
                    <td>
                        <form action="<?php echo e(route('categorias.destroy', $category->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="<?php echo e(route('categorias.edit', $category->id)); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Editar</button>
                        </form>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        </tbody>

    </table>
    <?php echo e($categories->links()); ?>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>