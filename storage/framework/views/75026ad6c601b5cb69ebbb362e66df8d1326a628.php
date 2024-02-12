
<?php $__env->startSection('titulo'); ?>
    Crear comida nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    <h1>Editar publicación</h1>

    <form action="<?php echo e(route('blog.update', $post->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="title">Nuevo título:</label>
        <input type="text" id="title" name="title" value="<?php echo e($post->title); ?>" required>
        <br>
        <label for="content">Nuevo contenido:</label>
        <input type="text" id="content" name="content" value="<?php echo e($post->content); ?>">
        <br>
        <!-- Vista previa de la imagen actual -->
        <label for="image">Imagen:</label><br>
        <img src="<?php echo e(asset('img/posts/' . $post->img)); ?>" style="max-width: 300px;"><br>

        <!-- Selección de la etiqueta -->
        <label for="tag_id">Seleccionar etiqueta:</label>
        <select name="tag_id">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($tag->id); ?>" <?php echo e($tag->id == $post->tag_id ? 'selected' : ''); ?>>
                    <?php echo e($tag->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <br>

        <label for="image">Cambiar imagen:</label>
        <input type="file" name="img">
        <br>

         <!-- Sección de estado -->
        <label for="status">Estado:</label>
        <select name="status" id="status">
            <option value="Draft" <?php echo e($post->status == 'Draft' ? 'selected' : ''); ?>>Borrador</option>
            <option value="Published" <?php echo e($post->status == 'Published' ? 'selected' : ''); ?>>Publicado</option>
        </select>
        <br>

        <br>
        <input type="submit" value="Actualizar">


    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>