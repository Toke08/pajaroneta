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
    filter: drop-shadow(5px 5px 5px rgba(0, 0, 0, 0.8));
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

}
.who_info{
    display: flex;
    flex-direction:column;
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
#restaurant, .publis, #comidas, #mapilla{
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
        <img src="<?php echo e(asset('img/landing_page/burger_izq.png')); ?>" alt="">
        <div class="who_info">
            <h2><?php echo app('translator')->get('Who are we?'); ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <img src="<?php echo e(asset('img/landing_page/burger_der.png')); ?>" alt="">
    </div>
    <div id="mapilla">
        <div class="tit">
            <h2><?php echo app('translator')->get('Find us...'); ?></h2>
            <img src="<?php echo e(asset('img/landing_page/pajatruck.png')); ?>" alt="">
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.5165004228597!2d-2.9419887246831182!3d43.26155407767463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e502842c84087%3A0x539b319a98f8cfbe!2sC.%20del%20Lic.%20Poza%2C%2031%2C%20Abando%2C%2048011%20Bilbao%2C%20Vizcaya!5e0!3m2!1ses!2ses!4v1707666740981!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div id="comidas">
        <h2><?php echo app('translator')->get("Our menu!"); ?></h2>
        <p><?php echo app('translator')->get("Come and enjoy our products with us!"); ?></p>
        <div id="comidita">
            <?php $__currentLoopData = $foods->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="com">
                    <a href="galeria-comidas/<?php echo e($food->name); ?>"><img src="<?php echo e(asset('img/foods')); ?>/<?php echo e($food->img); ?>"><img></a>
                    <br>
                    <h3><?php echo e($food->name); ?></h3>
                    <p><?php echo e($food->description); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

    <div class="publis">
        <h2><?php echo app('translator')->get("Our Blog and more"); ?></h2>
        <p><?php echo app('translator')->get("We invite you to read our recent blog's posts :)"); ?></p>
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
                <a href="<?php echo e($restaurant->url_maps); ?>" target="blank">Encuéntralos aquí</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/index.blade.php ENDPATH**/ ?>