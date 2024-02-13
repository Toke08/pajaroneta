

<?php $__env->startSection('titulo'); ?>
    Galería comidas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
    main *{
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
    }
    .titl{
        margin-top: 3%;
        margin-bottom: 3%;
    }
    .titl p{
        font-size: 1.2em;
        padding-top: 2%;
    }
    body{
        background-color: rgb(255, 255, 255)
        }

    .foods-container{
            display: grid;
            grid-gap:0.5rem;
            grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
            grid-auto-rows: auto;
            grid-auto-flow: dense;



    }
    .food-container{
            display: flex;
            justify-content: center;
            align-items:center;
            opacity: 0;
            animation: fadeIn 1.2s ease forwards;
    }

    .alto{
        grid-row: span 2;
    }
    .ancho{
        grid-column: span 2;

    }
    .grande{
        grid-column: span 2;
        grid-row: span 2;
    }

    img{
            width:100%;
            height:auto;
            vertical-align: middle;
            display: inline-block;

    }

    .food-container > img{
            width:100%;
            height:100%;
            border-radius: 1rem;
            object-fit: cover;
            /* aspect-ratio:1; */
    }

    .ancho{
        aspect-ratio: auto;
    }

    /* CATEGORIAS */

    /* Estilos para el contenedor principal */
.categorias-menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 10px;
}

/* Estilos para cada categoría */
.categoria {
    width: 150px;
    text-align: center;
    margin: 10px;
}

/* Estilos para la imagen */
.categoria img {
    aspect-ratio: 4/3;
    width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
    object-fit: cover;
}
.categoria a{
    color: #000000;
    text-decoration: none;
}

/* Estilos para el texto debajo de la imagen */
.categoria p {
    margin: 0;
    font-size: 16px;
    font-weight: bold;
}



    /*EFECTO APARICION*/

    @keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;

    }

}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="categorias-menu">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="categoria">
        
        <a href="<?php echo e(route('galeria_comidas', ['id' => $category->id])); ?>">
            <img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>">
            <p <?php if(filter_var($selected_category) == $category->id){ echo("class='outlined'");} ?>><?php echo e($category->name); ?></p>
            <style>
                .outlined{
                    border-bottom: 1px solid black;
                }
            </style>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
        <?php
        $delay = 1;
        ?>

        <div class="titl">
            <h1><?php echo app('translator')->get("Are you hungry?"); ?></h1>
            <p><?php echo app('translator')->get("Have a look at our products and come visit La Pajaroneta to try them!"); ?></p>
        </div>

        <div class="foods-container">
        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($food->id %8==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container grande fadeIn" style="animation-delay: <?php echo e($delay * 0.1); ?>s;">
            <img src="<?php echo e(asset('img/foods/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php elseif($food->id %4==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container alto fadeIn" style="animation-delay: <?php echo e($delay * 0.1); ?>s;">
            <img src="<?php echo e(asset('img/foods/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php elseif($food->id %3==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container ancho fadeIn" style="animation-delay: <?php echo e($delay * 0.1); ?>s;">
            <img src="<?php echo e(asset('img/foods/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php else: ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container" style="animation-delay: <?php echo e($delay * 0.1); ?>s;">
            <img src="<?php echo e(asset('img/foods/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php endif; ?>

        <?php
        $delay++;
        ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/galeria_comidas.blade.php ENDPATH**/ ?>