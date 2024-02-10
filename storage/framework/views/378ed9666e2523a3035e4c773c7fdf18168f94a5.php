
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
    <a href="<?php echo e(route('blog')); ?>">Volver al blog</a>

    <?php if(Session::has('error')): ?>
        <p><?php echo e(Session::get('error')); ?></p>

    <?php else: ?>
        <?php if($posts->isEmpty() && $restaurants->isEmpty()): ?>
            <strong>No hay publicaciones ni restaurantes relacionados con <?php echo e($tag->name); ?>.</strong>
        <?php else: ?>
            <?php if(!$posts->isEmpty()): ?>
                <strong>Publicaciones relacionadas con <?php echo e($tag->name); ?></strong><br>

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>"><br>
                        <strong><?php echo e($post->title); ?></strong>
                        <br>
                        <a href="<?php echo e(route('blog_show', $post->id)); ?>">Leer más...</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(!$restaurants->isEmpty()): ?>
                <strong>Restaurantes relacionados con <?php echo e($tag->name); ?></strong>
                <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="<?php echo e($restaurant->url_sitio); ?>"><?php echo e($restaurant->name); ?></strong>
                        <p><?php echo e($restaurant->description); ?></p>
                        <a href="<?php echo e($restaurant->url_maps); ?>">Encuéntralos aquí</a>
                        <br>
                        <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/tags_show.blade.php ENDPATH**/ ?>