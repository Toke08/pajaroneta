<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <form action="<?php echo e(route('user_update', $user->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                                    
                                    <label for="image">Cambiar imagen:</label>
                                    <input type="file" name="img">
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" required></li>
                                <li class="list-group-item"><strong>Email:</strong> <input type="text" id="email" name="email" value="<?php echo e($user->email); ?>" required></li>
                                <!-- No mostrar la contraseña directamente -->
                            </ul>
                        </div>

                        <form action="<?php echo e(route('user_edit', $user->id)); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Editar</button>
                        </form>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    // JavaScript para abrir el modal cuando se hace clic en el botón
    document.getElementById('changePassword').addEventListener('click', function () {
        $('#changePasswordModal').modal('show');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/client/user_edit.blade.php ENDPATH**/ ?>