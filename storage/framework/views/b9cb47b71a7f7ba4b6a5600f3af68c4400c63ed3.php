<?php $__env->startSection('titulo'); ?>
Crear usuario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
    :root{
    --rojoOscuro:#730000;
    --rojoClaro:#A62224;
    --amarilloOscuro:#CA8F00;
    --amarilloClaro:#E5A200;
    --blanco:#FFFFFF;
    --gris:#F4F4F4;
    --negro:#000000;
}

    /* Cabecera de la tabla */
    body > div > div.content-wrapper > main > div > div{
    background-color: var(--rojoOscuro) !important;
}

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?php echo e(route('user.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>




                    <div class="form-group">
                        <label>Select</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">Seleccione un rol</option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

            

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/users/create.blade.php ENDPATH**/ ?>