<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
.act input{
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-black">
                    <?php echo app('translator')->get("User profile"); ?>
                </div>
                <form action="<?php echo e(route('user_update', $user->name)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                                    
                            </div>
                            <label for="image"><?php echo app('translator')->get( "Change profile pic"); ?></label>
                                    <input type="file" name="img">
                            <ul class="list-group">
                                <li class="list-group-item"><strong><?php echo app('translator')->get("Name"); ?>:</strong> <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" required></li>
                                <li class="list-group-item"><strong><?php echo app('translator')->get("Email"); ?>:</strong> <?php echo e($user->email); ?></li>
                                <!-- No mostrar la contraseña directamente -->
                            </ul>
                        </div>

                        <input class="act" type="submit" value=<?php echo app('translator')->get("Update"); ?>>

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

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/user_edit.blade.php ENDPATH**/ ?>