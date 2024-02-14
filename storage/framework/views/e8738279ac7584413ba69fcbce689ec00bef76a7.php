<?php $__env->startSection('estilos'); ?>

<style>
.landing_page {
    /* display:flex;
    flex-direction:row;*/
    margin-top: 10%;
    place-items:center;
    justify-content:center;
    display: grid;
    grid-gap:5rem;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Puedes ajustar el ancho según tus necesidades */
    grid-auto-rows: auto;
    grid-auto-flow: dense;


}
.part1 img{
    position: absolute;
    margin-left: 20%
}
.papa1 {
    top: -10rem;
    left: -30rem;
    width:50em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.70;
    z-index:  -2;
    rotate: -25deg;
}

.papa3 {
    top: 7rem;
    left: -32rem;
    width:45em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.82;
    z-index:  -1;
}

.papa2 {
    top: 15rem;
    left: -20rem;
    width:45em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.90;

    z-index:  0;
    rotate: 10deg;
}
.part2{
    display:grid;
    place-items:center;
}
.part2 p{
    font-size: 1.5em;
    align-items: center;
    text-align: center;
}
.part2 img{
    width:40em;
}
.part3 img{
    position: absolute;
}
.hot1{
    top: -2rem;
    right: -5rem;
    width: 50em;
    drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.8));
    z-index:  -1;
    scale: 0.75;
}
.hot2{
    top: 15rem;
    right: -5rem;
    width: 50em;
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.9;
    rotate: 25deg;
    z-index:  0;
}

@media screen and (max-width: 1660px) {
    .papa1 {
    top: -10rem;
    left: -30rem;
    width:50em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.50;
    z-index:  -2;
    rotate: -25deg;
}

.papa3 {
    top: 7rem;
    left: -32rem;
    width:45em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.62;
    z-index:  -1;
}

.papa2 {
    top: 15rem;
    left: -20rem;
    width:45em;
    filter: drop-shadow(-5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.70;

    z-index:  0;
    rotate: 10deg;
}

.hot1{
    top: -2rem;
    right: -10rem;
    width: 50em;
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.8));
    z-index:  -1;
    scale: 0.55;
}
.hot2{
    top: 15rem;
    right: -10rem;
    width: 50em;
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.8));
    scale: 0.7;
    rotate: 25deg;
    z-index:  0;
}
}

@media screen and (max-width: 1366px) {
    .papa1 {
    display: none;
}

.papa3 {
    display: none;
}

.papa2 {
    display: none;
}

.hot1{
    display: none;
}
.hot2{
    display: none;
}

}
/* quienes somos */
.who{
    display: flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    background-color: #730000;
    color: #ffffff;
    background-position: center;
    margin-top: 20%;
    border-radius: 7px;
    padding: 25px;

}
.who_info{
    display: flex;
    flex-direction:column;
}
.who_info p{
   text-align: justify;
}
.who img{
    width:35em;
    height: 25em;
}
/* estilo mapa */
.tit{
    display: flex;
    flex-direction: row;
    align-items:center;
}
.tit img{
    width: 7%;
    margin-left: 3%;

}
#mapilla iframe{
    width: 100%;
    border-radius:1.5em;
    box-shadow: 2px 4px 20px -3px rgba(0,0,0,0.54);
}

/* estilos restaurantes */
.restaurantes{
    width: 500px;
    padding: 10px;
    max-width: 500px;
}
.restaurantes img{
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
.restaurantes img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}
#restaurant, .publis, #comidas, #mapilla{
    margin-top: 10%;
}
.restaurantes a{
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
/* estilos post */
#posts{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}

#posts img{
    max-width: 90%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#posts img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}
#posts button{
    background-color: #E5A200;
    color: #ffffff;
    border: none;
    border-radius: 1.5em;
    width: 30%;
    padding: 2%;
    transition: 0.3s ease-in-out;
}
#posts button:hover{
    background-color: #CA8F00;
    transition: box-shadow 0.3s ease-in-out;
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

/* estilos comida */
#comidita{
    display: grid;
    grid-gap:0.5rem;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-auto-rows: auto;
    grid-auto-flow: dense;
}

#comidita img{
    max-width: 90%;
    height: auto;
    margin-bottom: 10px;
    object-fit: cover;
    border-radius: 10px;
}
#comidita img:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: box-shadow 0.3s ease-in-out;
}

@media only screen and (max-width: 767px) {
    .landing_page {
    display: flex;
    justify-content: center; /* Centra horizontalmente */
    align-items: center; /* Centra verticalmente */
    height: 100vh; /* Establece la altura del div al 100% del viewport */
}

.landing_page img {
    max-width: 100%; /* Ajusta el tamaño máximo de la imagen */
    height: auto; /* Ajusta la altura automáticamente */
}
    .who img {
        display: none;
        padding: 50px;
    }
}

</style>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>

    <div class="landing_page">
        <div class="part1">
            <img class="papa2" src="<?php echo e(asset('img/landing_page/papa_2.png')); ?>" alt="">
            <img class="papa1" src="<?php echo e(asset('img/landing_page/papas_1.png')); ?>" alt="">
            <img class="papa3" src="<?php echo e(asset('img/landing_page/papas_1.png')); ?>" alt="">
        </div>
        <div class="part2">
            <img src="<?php echo e(asset('img/landing_page/pajaro-02.png')); ?>" alt="">
            <p><?php echo app('translator')->get('Yummy food for celiac and lactose intolerant people throughout Spain'); ?></p>
        </div>
        <div class="part3">
            <img class="hot1" src="<?php echo e(asset('img/landing_page/perro_caliente.png')); ?>" alt="">
            <img class="hot2" src="<?php echo e(asset('img/landing_page/perro_caliente.png')); ?>" alt="">
        </div>
    </div>

    <div class="who">
        <img src="<?php echo e(asset('img/landing_page/burger.png')); ?>" alt="" style="width: 300px; height: auto;">
        <div class="who_info">
            <h2><?php echo app('translator')->get('Who are we?'); ?></h2>
            <p><?php echo app('translator')->get('Welcome to La Pajaroneta! We are an exciting food truck company specializing in offering delicious fast food options that are gluten and lactose-free. Whether you are at a local event or in your neighborhood, our dedicated team is ready to delight you with safe and satisfying culinary options.'); ?></p>
        </div>
        <img src="<?php echo e(asset('img/landing_page/burger.png')); ?>" alt="" style="width: 300px; height: auto;">
    </div>

    <div id="mapilla">
        <div class="tit">
            <h2><?php echo app('translator')->get('Find us...'); ?></h2>
            <img src="<?php echo e(asset('img/landing_page/pajatruck.png')); ?>" alt="">
        </div>
        <iframe src="<?php echo e($url); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="comidas">
        <h2><?php echo app('translator')->get("Our menu!"); ?></h2>
        <p><?php echo app('translator')->get("Come and enjoy our products with us!"); ?></p>
        <div id="comidita">
            <?php $__currentLoopData = $foods->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="com">
                    <a href="<?php echo e(route('galeria-comidas.show', ['id' => $food->id])); ?>"><img src="<?php echo e(asset('img/foods')); ?>/<?php echo e($food->img); ?>"><img></a>
                    <br>
                    <h3><?php echo e($food->name); ?></h3>
                    <p><?php echo e($food->description); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

    <div class="publis">
        <h2><?php echo app('translator')->get("Our Blog and more"); ?></h2>
        <p><?php echo app('translator')->get("We invite you to read our recent blog's posts!"); ?></p>
        <div id="posts">
            <?php $__currentLoopData = $posts->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post">
                    <a href="blog/<?php echo e($post->id); ?>"><img src="<?php echo e(asset('img/posts')); ?>/<?php echo e($post->img); ?>"><img></a>
                    <br>
                    <h3><?php echo e($post->title); ?></h3>
                    <button> <a href="blog/<?php echo e($post->id); ?>"><?php echo app('translator')->get("Read more"); ?></a></button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



    <div id="restaurant"></div>
        <h2><?php echo app('translator')->get("If we are not around..."); ?></h2>
        <p><?php echo app('translator')->get("Here you have restaurants with healthy options!"); ?></p>
        <div id="div-restaurantes">
            <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="restaurantes">
                <a href="<?php echo e($restaurant->url_sitio); ?>" target="blank">
                    <h3><?php echo e($restaurant->name); ?></h3>

                    <p><?php echo e($restaurant->description); ?></p>

                    <br>
                    <img src="<?php echo e(asset('img/restaurants') . '/' . $restaurant->img); ?>" alt="<?php echo e($restaurant->name); ?>"><br>
                </a>
                <a href="<?php echo e($restaurant->url_maps); ?>" target="blank"><?php echo app('translator')->get("Find them here"); ?></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/index.blade.php ENDPATH**/ ?>