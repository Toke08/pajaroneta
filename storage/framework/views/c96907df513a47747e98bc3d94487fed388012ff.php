
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

#posts{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}


#posts > img{
    width:100%;
    height:100%;
    border-radius: 1rem;
    object-fit: cover;
}

#posts button{
    background-color: #E5A200;
    color: #ffffff;
    border: none;
    border-radius: 1.5em;
    width: 35%;
    padding: 2%;
    transition: 0.3s ease-in-out;
}
#posts button:hover{
    background-color: #CA8F00;
}
#posts button a{
    text-decoration: none;
    color: #ffffff;
}
#posts button:active{
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none;
}
.restaurants{

    width: 500px;
    padding: 10px;
    max-width: 500px;
}

img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#restaurant{
    margin-top: 10%;
}
.restaurants a{
    color: #000000;
    text-decoration: none;
}
#div-restaurantes{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}
.cates{
    display:flex;
    flex-direction: row;
    justify-content: center;
}
.cates a{
    margin: 2.5%;
    color: #000000;
    text-decoration: none;
}
</style>





<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <div id="blog">
        <h1>Blog-oneta</h1>
        <p>Publicaciones, opiniones y más...</p>
        <div class="cates">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('tags_show', $tag)); ?>"><?php echo e($tag->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>



        <div id="posts">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="post">
                <img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img><br>
                <h3><?php echo e($post->title); ?></h3>
                <button> <a href="blog/<?php echo e($post->id); ?>">Leer más</a></button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div id="restaurant"></div>
        <h2>Por si estamos lejos de ti...</h2>
        <p>¡Encuentra restaurantes con opciones saludables cerca de ti!</p>
        <div id="div-restaurantes">
            <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="restaurants">
                <a href="<?php echo e($restaurant->url_sitio); ?>" target="blank"><?php echo e($restaurant->name); ?></a>
                <p><?php echo e($restaurant->description); ?></p>

                <br>
                <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
                <a href="<?php echo e($restaurant->url_maps); ?>" target="blank">Encuéntralos aquí</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/blog.blade.php ENDPATH**/ ?>