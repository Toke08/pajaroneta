
<?php $__env->startSection('titulo'); ?>
    Crear publicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

    <h1>Crear publicación</h1>
    <form action="<?php echo e(route('blog.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <br>

        <label for="content">Contenido:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        <br>

        <label for="img">Imagen:</label>
        <input type="file" id="img" name="img" required>
        <br>

        <label for="tag">Categoría:</label>
        <select name="tag_id" id="tag_id">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="1">Borrador</option>
            <option value="0">Publicado</option>
        </select>
        <br>

        <button type="submit">Publicar</button>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/blog/create.blade.php ENDPATH**/ ?>