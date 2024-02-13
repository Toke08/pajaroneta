
<?php $__env->startSection('titulo'); ?>
Editar categoria
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">

    <form action="<?php echo e(route('categorias.update', $category->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo e($category->name); ?>" required>
            </div>
            <div class="form-group">
                <!-- Vista previa de la imagen actual -->
                <label for="image">Imagen actual:</label><br>
                <img src="<?php echo e(asset('img/categories')); ?>/<?php echo e($category->img); ?>" style="max-width: 200px;"><br>
            </div>
            <div class="form-group">
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Cambiar imagen</label>
                </div>
            </div>
            
                <button type="submit" class="btn btn-primary">Guardar</button>
            
    </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>