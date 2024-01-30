
<?php $__env->startSection('titulo'); ?>
    Crear restaurante sugerido
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Formulario de Ingreso de Nueva Categoría</h1>

<form action="<?php echo e(route('restaurants.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <label for="name">Nombre del restaurante:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="description">Descripción:</label>
    <textarea id="description" name="description" required></textarea>
    <br>

    <label for="url">URL:</label>
    <input type="text" id="url" name="url" required>
    <br>

    <label for="image">Imagen:</label>
    <input type="file" name="img" accept="image/*" required>
    <br>

    <label for="tag">Categoría:</label>
        <select name="tag_id" id="tag_id">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

    <button type="submit">Crear nuevo restaurante sugerido</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/restaurants/create.blade.php ENDPATH**/ ?>