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

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <h1>PajaroBlog</h1>

    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('tags.show', $tag)); ?>"><?php echo e($tag->name); ?></a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post">
            <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img><br>
            <strong><?php echo e($post->title); ?></strong><br>
            <a href="blog/<?php echo e($post->id); ?>">Leer más...</a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2>Restaurantes sugeridos</h2>
    <div class="restaurant">
        <p>Nombre: <?php echo e($restaurant->name); ?></p>
        <p>Descripción: <?php echo e($restaurant->description); ?></p>
        <p>Tag: <?php echo e($restaurant->tag->name); ?></p>
        <a href="<?php echo e($restaurant->url); ?>" target="_blank">Visitar sitio</a>
        <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>">

        <!-- Agrega aquí tus botones de borrar y editar -->
        <form action="<?php echo e(route('restaurants.destroy', $restaurant->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit">Borrar</button>
        </form>
        <form action="<?php echo e(route('restaurants.edit', $restaurant->id)); ?>" method="GET">
            <?php echo csrf_field(); ?>
            <button type="submit">Editar</button>
        </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/blog.blade.php ENDPATH**/ ?>