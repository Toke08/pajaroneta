
<?php $__env->startSection('titulo'); ?>
Crear categoria nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">


    <form action="<?php echo e(route('categorias.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Introducir nombre" required>
            </div>
            <div class="form-group">
                <label for="image">imagen *</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Elegir imagen</label>
                </div>
            </div>
            
            
                <button type="submit" class="btn btn-primary">Guardar</button>
            
        </div>


    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/categories/create.blade.php ENDPATH**/ ?>