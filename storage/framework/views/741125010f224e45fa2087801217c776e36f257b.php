
<?php $__env->startSection('titulo'); ?>
Crear publicación
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="card card-primary">
    <form action="<?php echo e(route('blog.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Título *</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="Ingrese el título de la publicación" required>
            </div>
            <div class="form-group">
                <label for="content">Contenido *</label>
                <textarea class="form-control" id="content" name="content" rows="4" placeholder="Ingrese el contenido de la publicación..." required></textarea>
            </div>
            <div class="form-group">
                <label for="customFile">Imagen *</label>

                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Elige una imagen</label>
                </div>
            </div>
            <div class="form-group">
                <label for="tag">Categoría *</label>
                <select class="form-control" name="tag_id" id="tag_id">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Estado *</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Draft">Borrador</option>
                    <option value="Published">Publicado</option>
                </select>
            </div>


            <button class="btn btn-primary" type="submit">Guardar</button>

        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>