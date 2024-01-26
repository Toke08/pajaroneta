<h1>Editar categoria nueva</h1>

<form action="<?php echo e(route('categorias.update', $category->id)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" value="<?php echo e($category->name); ?>" required>
    <br>
    <!-- Vista previa de la imagen actual -->
    <label for="image">Imagen actual:</label><br>
    <img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>" style="max-width: 200px;"><br>

    <label for="image">Cambiar imagen:</label>
    <input type="file" name="img">
    <br>
    <input type="submit" value="Actualizar">
</form>
<?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/categories/edit.blade.php ENDPATH**/ ?>