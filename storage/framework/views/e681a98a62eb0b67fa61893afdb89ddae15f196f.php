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
.item a{
    color: #000000;
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
    width: 13%;
    border:none;
    height: 2.5em;
    padding-top: 0.2%;
    border-radius:1.5em;
    text-align: center;
    transition: 0.3s ease-in-out;
}
.btn_back a{
    color: #ffffff;
    text-decoration: none;
}
.btn_back:hover{
    background-color: #CA8F00;
}
.publis{
    width: 100%;
    display: flex;
    flex-direction: row;
    margin-bottom: 5%;

}
.publis a{
    text-decoration: none;
}
.publis a:hover{
    color:#9d0000;
}
.publis button{
    background-color: #E5A200;
    border: none;
    border-radius: 1.5em;
    width: 20%;
    height: 2.5em;;
    padding-top: 0.2%;
    transition: 0.3s ease-in-out;
}
.publis button a{
    color: #ffffff;
}
.publis button:hover {
    background-color: #CA8F00;

}
.publis button:active {
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    box-shadow: none; /* Elimina la sombra cuando se hace clic */
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <button class="btn_back"><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get("Go back"); ?></a></button>



    <div class="blog_conte">
        <?php if(Session::has('error')): ?>
        <p><?php echo e(Session::get('error')); ?></p>

    <?php else: ?>
        <div class="">
            <?php if($posts->isEmpty() && $restaurants->isEmpty()): ?>
            <div class="titulo">
                <strong><?php echo app('translator')->get("There is no content related to"); ?> <?php echo e($tag->name); ?>.</strong>
            </div>
            <?php else: ?>
        </div>

            <?php if(!$posts->isEmpty()): ?>
                <div class="titulo">
                    <strong><?php echo app('translator')->get("Posts related with"); ?> <?php echo e($tag->name); ?></strong><br>
                </div>
            <div class="publis">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>"><br>
                        <h3><?php echo e($post->title); ?></h3>
                        <br>
                        <button><a href="<?php echo e(route('blog_show', $post->id)); ?>"><?php echo app('translator')->get("Read more"); ?></a></button>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <?php if(!$restaurants->isEmpty()): ?>
                <div class="titulo">
                    <strong><?php echo app('translator')->get("Restaurants related with"); ?> <?php echo e($tag->name); ?></strong>
                </div>
                <div class="publis">
                <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <h3> <a href="<?php echo e($restaurant->url_sitio); ?>"><?php echo e($restaurant->name); ?></strong></h3>
                        <p><?php echo e($restaurant->description); ?></p>

                        <br>
                        <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
                        <a href="<?php echo e($restaurant->url_maps); ?>"><?php echo app('translator')->get("Find them here"); ?></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/tags_show.blade.php ENDPATH**/ ?>