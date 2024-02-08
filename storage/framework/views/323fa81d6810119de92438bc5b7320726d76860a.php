<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
.table img{
    width: 150px;
    object-fit: cover;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <a href="<?php echo e(route('adminHome')); ?>">Volver al panel de administrador</a>
    <h1>PajaroBlog</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Fecha publicacion</th>
                    <th>ultima modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($post->id); ?></td>
                    <td><a href="blog/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></td>
                    <td><?php echo e($post->status); ?>

                        
                    </td>
                    <td>
                        <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img>
                    </td>
                    <td>
                        <?php echo e($post->created_at); ?>

                    </td>
                    <td>
                        <?php echo e($post->updated_at); ?>

                    </td>
                    <td>
                        <form action="<?php echo e(route('blog.edit', $post->id)); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Editar</button>
                        </form>

                        <form action="<?php echo e(route('blog.destroy', $post->id)); ?>"   method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>


</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>