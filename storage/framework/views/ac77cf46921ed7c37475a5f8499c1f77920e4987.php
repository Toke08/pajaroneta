<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
body {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Asegúrate de que el contenido se ajuste al ancho de la pantalla y se envuelva cuando sea necesario */
}

.post {
    flex: 1;
    padding: 15px;
    max-width: 300px;
}

/* Añade una nueva regla para los posts para mostrarlos en línea */
.post {
    flex-basis: calc(33.33% - 20px); /* Ajusta según el número de posts que desees en una fila y el espacio entre ellos */
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
    border-radius: 10px;
}
#restaurant{
    font-size:1.5em;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <h1>Blog-oneta</h1>
    <p>Publicaciones, opiniones y más...</p>
    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('tags_show', $tag)); ?>"><?php echo e($tag->name); ?></a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post">
            <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img><br>
            <h3><?php echo e($post->title); ?></h3>
            <a href="blog/<?php echo e($post->id); ?>">Leer más...</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <h2>¿Estámos lejos?</h2>
    <p>¡Encuentra más opciones saludables cerca a ti!</p>

    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="restaurant">
        <a href="<?php echo e($restaurant->url_sitio); ?>"><?php echo e($restaurant->name); ?></a>
        <p><?php echo e($restaurant->description); ?></p>
        <a href="<?php echo e($restaurant->url_maps); ?>">Encuéntralos aquí</a>
        <br>
        <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/blog.blade.php ENDPATH**/ ?>