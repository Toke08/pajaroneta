<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<?php $__env->stopSection(); ?>
<style>
button{
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
}
#changePassword{
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
}
#changePassword:hover{
    background-color: #CA8F00;
}
.form-control {
    border-radius: 1.5em;
    border:0.4px solid #000000;
}
.card-body{
        background-image: url('<?php echo e(asset('img/landing_page/Trucks.png')); ?>'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 300px 400px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */

}

.card-header{
    border:none;
    text-align: center;
    font-size: 1.2em;
    background-color: #ffff;
}
</style>
<?php $__env->startSection('contenido'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-white  text-black">
                    <?php echo app('translator')->get("User profile"); ?>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image"
                             class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong><?php echo app('translator')->get("Name"); ?>:</strong> <?php echo e($user->name); ?></li>
                        <li class="list-group-item"><strong><?php echo app('translator')->get("Email"); ?>:</strong> <?php echo e($user->email); ?></li>
                        <!-- No mostrar la contraseña directamente -->
                    </ul>
                </div>

                <form action="<?php echo e(route('user_edit', $user->name)); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit"><?php echo app('translator')->get("Edit"); ?></button>
                </form>

                <!-- Botón para abrir el modal -->
                <button id="changePassword" type="button" class="btn">
                   <?php echo app('translator')->get("Change password"); ?>
                </button>

                <!-- Modal para cambiar la contraseña -->
                <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
                     aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePasswordModalLabel"><?php echo app('translator')->get("Change password"); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- Formulario para cambiar la contraseña -->
                                <form action="<?php echo e(route('cambiar_contrasena')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <!-- Agrega los campos necesarios (contraseña actual, nueva contraseña, confirmación) -->
                                    <div class="form-group">
                                        <label for="current_password"><?php echo app('translator')->get("Current password"); ?></label>
                                        <input type="password" name="current_password" id="current_password"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password"><?php echo app('translator')->get("New password"); ?></label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation"><?php echo app('translator')->get("Confirm new password"); ?></label>
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn"><?php echo app('translator')->get("Save changes"); ?></button>
                                    <!-- Botón para cerrar el modal -->
                                    
                                    </button>
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

<?php $__env->startSection('script'); ?>
<script>
    // JavaScript para abrir el modal cuando se hace clic en el botón
    document.getElementById('changePassword').addEventListener('click', function () {
        $('#changePasswordModal').modal('show');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/user_show.blade.php ENDPATH**/ ?>