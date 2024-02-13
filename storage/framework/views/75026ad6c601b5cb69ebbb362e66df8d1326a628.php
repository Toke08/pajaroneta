<?php $__env->startSection('titulo'); ?>
    Editar publicaciones
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="card card-primary">

    <form action="<?php echo e(route('blog.update', $post->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Nuevo título:</label>
                <input class="form-control" type="text" id="title" name="title" value="<?php echo e($post->title); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Nuevo contenido:</label>
                <textarea class="form-control" type="text" id="content" name="content" ><?php echo e($post->content); ?></textarea>
            </div>
            <div class="form-group">
                <!-- Vista previa de la imagen actual -->
                <label for="image">Imagen:</label><br>
                <img src="<?php echo e(asset('img/posts/' . $post->img)); ?>" style="max-width: 300px;"><br>
            </div>
            <div class="form-group">
                <label for="tag_id">Seleccionar etiqueta:</label>
                <select class="form-control"  name="tag_id">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->id); ?>" <?php echo e($tag->id == $post->tag_id ? 'selected' : ''); ?>>
                            <?php echo e($tag->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">imagen *</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Elegir imagen</label>
                </div>
            </div>

            <div class="form-group">
                <!-- Sección de estado -->
                <label for="status">Estado:</label>
                <select class="form-control" name="status" id="status">
                    <option value="Draft" <?php echo e($post->status == 'Draft' ? 'selected' : ''); ?>>Borrador</option>
                    <option value="Published" <?php echo e($post->status == 'Published' ? 'selected' : ''); ?>>Publicado</option>
                </select>
            </div>



            <input class="btn btn-primary" type="submit" value="Actualizar">
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>