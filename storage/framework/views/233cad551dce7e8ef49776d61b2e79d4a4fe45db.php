
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
body {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    padding: 20px;
}

.post {
    flex: 1; /* Hace que cada contenedor ocupe el espacio disponible */
    padding: 15px;
    max-width: 300px; /* Ancho máximo para cada contenedor */

}

strong {
    color: #333;
}

p {
    margin: 0;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

img {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px; /* Ajusta el valor para cambiar la cantidad de curvatura */
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <h2>PajaroBlog</h2>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post">
            <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img><br>
            <strong><?php echo e($post->title); ?></strong><br>
            <a href="blog/<?php echo e($post->id); ?>">Leer más...</a>

            <form action="<?php echo e(route('blog.destroy', $post->id)); ?>"   method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit">Borrar</button>
            </form>
            <form action="<?php echo e(route('blog.edit', $post->id)); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <button type="submit">Editar</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/blog/index.blade.php ENDPATH**/ ?>