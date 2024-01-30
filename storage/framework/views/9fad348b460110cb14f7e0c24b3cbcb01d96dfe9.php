
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
body {
    display: flex;
    align-items: left;
    justify-content: center;
    height: 100vh;
    margin: 0;
}
.post {
    padding: 15px;
    width: 300px; /* Puedes ajustar el ancho según tus necesidades */
    text-align: center;
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
    <?php if(Session::has('error')): ?>
        <p><?php echo e(Session::get('error')); ?></p>
    <?php else: ?>
        <?php if($posts->isEmpty()): ?>
            <strong>No hay publicaciones relacionadas con <?php echo e($tag->name); ?>.</strong> <BR></BR>
            <a href="<?php echo e(route('tags.index')); ?>">Volver a las categorías</a>
        <?php else: ?>
            <h2>Publicaciones relacionadas con <?php echo e($tag->name); ?></h2>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post">
                    <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>"><br>
                    <strong><?php echo e($post->title); ?></strong>
                    <br>
                    <a href="../blog/<?php echo e($post->id); ?>">Leer más...</a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/tags/show.blade.php ENDPATH**/ ?>