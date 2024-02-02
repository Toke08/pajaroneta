

<?php $__env->startSection('titulo'); ?>
    <!-- Puedes agregar el título aquí si es necesario -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
    <!-- Puedes agregar estilos específicos aquí si es necesario -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> <?php echo e($user->name); ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo e($user->email); ?></li>
                        <!-- No mostrar la contraseña directamente -->
                    </ul>
                </div>

                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePasswordModal">
                    Cambiar Contraseña
                </button>

                <!-- Modal para cambiar la contraseña -->
                <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- Formulario para cambiar la contraseña -->
                                <form action="<?php echo e(route('cambiar_contrasena')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <!-- Agrega los campos necesarios (contraseña actual, nueva contraseña, confirmación) -->
                                    <div class="form-group">
                                        <label for="current_password">Contraseña Actual</label>
                                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">Nueva Contraseña</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirmar Nueva Contraseña</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                    <!-- Botón para cerrar el modal -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/user_show.blade.php ENDPATH**/ ?>