<?php $__env->startSection('titulo'); ?>
Crear comida nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Crear comida nueva</h1>


    <form action="<?php echo e(route('galeria-comidas.create')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" required>
        <br>
        <select name="categories" id="">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br>
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Enviar">



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/foods/create.blade.php ENDPATH**/ ?>