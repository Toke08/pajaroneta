

<?php $__env->startSection('titulo'); ?>
    Galeria de comidas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
    main *{
        box-sizing: border-box;
        margin: 0 auto;
        padding: 0;
    }

    body{
        background-color: rgb(230, 230, 230)
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
            animation: fadeIn 1s ease forwards;
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

    @keyframes fadeIn {
    0% {
        opacity: 0;
        filter:blur(10px);
    }
    10% {
        opacity: 1;
        filter:brightness(1.5) blur(5px);
    }
    100% {
        opacity: 1;

    }
}







</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($food->id %8==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container grande fadeIn" style="animation-delay: <?php echo e($food->id * 0.05); ?>s;">
            <img src="<?php echo e(asset('img/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php elseif($food->id %4==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container alto fadeIn" style="animation-delay: <?php echo e($food->id * 0.05); ?>s;">
            <img src="<?php echo e(asset('img/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php elseif($food->id %3==0): ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container ancho fadeIn" style="animation-delay: <?php echo e($food->id * 0.05); ?>s;">
            <img src="<?php echo e(asset('img/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php else: ?>
        <a href="galeria-comidas/<?php echo e($food->id); ?>" class="food-container" style="animation-delay: <?php echo e($food->id * 0.05); ?>s;">
            <img src="<?php echo e(asset('img/'.$food->img)); ?>">
                <!-- <h2>$food->name</h2> -->
            </a>
        <?php endif; ?>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/foods/index.blade.php ENDPATH**/ ?>