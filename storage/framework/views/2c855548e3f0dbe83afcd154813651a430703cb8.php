
<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<body>
    <h2>Restaurantes sugeridos</h2>
    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/restaurants/index.blade.php ENDPATH**/ ?>