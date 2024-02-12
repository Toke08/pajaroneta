<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
/* body {

    align-items: left;
    justify-content: center;
    height: 100vh;
    margin: 0;
} */
/* .post {
    padding: 15px;
    width: 300px; /* Puedes ajustar el ancho según tus necesidades
    text-align: center;
} */

.titulo{
    padding-top:2%;
    padding-bottom:2%;
}

p {
    margin: 0;
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
.item{
    width: 50%;
}
.item:hover{
    backface-visibility: 2%;
}
.item img {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    width: 50%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px; /* Ajusta el valor para cambiar la cantidad de curvatura */
}
.btn_back{
    background-color:#E5A200 ;
    width: 15%;
    height: 2em;
    border:none;
    padding-top: 0.2%;
    border-radius:1.5em;
    text-align: center
}
.btn_back a{
    color: #ffffff;
}
.publis{
    width: 100%;
    display: flex;
    flex-direction: row;
    margin-bottom: 5%;

}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div class="btn_back">
        <a href="<?php echo e(route('blog')); ?>">Volver al blog</a>
    </div>


    <div class="blog_conte">
        <?php if(Session::has('error')): ?>
        <p><?php echo e(Session::get('error')); ?></p>

    <?php else: ?>
        <div class="">
            <?php if($posts->isEmpty() && $restaurants->isEmpty()): ?>
            <div class="titulo">
                <strong>No hay publicaciones ni restaurantes relacionados con <?php echo e($tag->name); ?>.</strong>
            </div>
            <?php else: ?>
        </div>

            <?php if(!$posts->isEmpty()): ?>
                <div class="titulo">
                    <strong>Publicaciones relacionadas con <?php echo e($tag->name); ?></strong><br>
                </div>
            <div class="publis">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>"><br>
                        <strong><?php echo e($post->title); ?></strong>
                        <br>
                        <a href="<?php echo e(route('blog_show', $post->id)); ?>">Leer más...</a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <?php if(!$restaurants->isEmpty()): ?>
                <div class="titulo">
                    <strong>Restaurantes relacionados con <?php echo e($tag->name); ?></strong>
                </div>
                <div class="publis">
                <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <a href="<?php echo e($restaurant->url_sitio); ?>"><?php echo e($restaurant->name); ?></strong>
                        <p><?php echo e($restaurant->description); ?></p>
                        <a href="<?php echo e($restaurant->url_maps); ?>">Encuéntralos aquí</a>
                        <br>
                        <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/tags_show.blade.php ENDPATH**/ ?>