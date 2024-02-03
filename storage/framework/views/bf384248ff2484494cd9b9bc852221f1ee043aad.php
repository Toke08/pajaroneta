

<?php $__env->startSection('titulo'); ?>
    Galeria de comidas
<?php $__env->stopSection(); ?>



<?php $__env->startSection('contenido'); ?>
<style>
body{
    background-color: rgb(230, 230, 230)
    }
    .foods-container{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap:1rem;

    }
    .food-container{
        /* aspect-ratio: 1 / 1; */
        object-fit: fill;
    }

    .food-container:nth-child(1){
        grid-column: span 2;
        grid-row: span 1;
    }
.food-container{



}
.food-container{



}
    .food-container img{
        border-radius: 2rem;
        width: 100%;
        /* aspect-ratio:1; */


    }


</style>
    <h1>Galeria de comidas</h1>
        <div class="foods-container">
        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="food-container">
            <img src="<?php echo e(asset('img/'.$food->img)); ?>">
            <h2><?php echo e($food->name); ?></h2>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\RivoJ\Desktop\UniServerZ\www\pajaroneta\resources\views/foods/index.blade.php ENDPATH**/ ?>