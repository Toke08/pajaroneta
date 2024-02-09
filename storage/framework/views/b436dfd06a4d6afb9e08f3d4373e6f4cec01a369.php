
<?php $__env->startSection('titulo'); ?>
Crear comida nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Editar comida</h1>


    <form action="<?php echo e(route('galeria-comidas.update', $food->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="name">Nombre:</label>
        <br>
        <input type="text" id="name" name="name" value="<?php echo e($food->name); ?>" required>
        <br>
        <label for="description">Descripcion:</label>
        <br>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo e($food->description); ?></textarea>
        <br>
        <label for="price">Precio:</label>
        <br>
        <input type="text" id="price" name="price" value="<?php echo e($food->price); ?>" required>
        <br>
        <label for="categories">categoria:</label>
        <br>
        <select name="category_id" id="">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($category->id == $food->category->id) { echo("selected"); } ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br>
        <label for="image">imagen:</label>
        <input type="file" name="img">
        <br>
        <input type="submit" value="Actualizar">



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/foods/edit.blade.php ENDPATH**/ ?>