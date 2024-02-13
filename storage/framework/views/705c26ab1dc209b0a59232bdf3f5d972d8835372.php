<?php $__env->startSection('estilos'); ?>

<style>
.btn-primary {
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
    width: 100%;
}
.btn-primary:hover{
    background-color: #CA8F00;
}
.form-control {
    border-radius:1.5em;
}
.card-body{
        background-image: url('<?php echo e(asset('img/landing_page/Trucks.png')); ?>'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 300px 400px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */
        display:flex;
        flex-direction:column;
        /* justify-content:center; */
        place-items:center;
}
.card{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius:1em;

}
.question{
    display: flex;
    flex-direction: row;
    align-items: center;
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
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="profile_img" value="user_default.jpg">

                        <div class="col mb-3">
                            <label for="name" class="col-md-12 col-form-label text-md-end"><?php echo e(__('Name')); ?>*</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="email" class="col-md-10 col-form-label text-md-end"><?php echo e(__('Email Address')); ?>*</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-end"><?php echo e(__('Password')); ?>*</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-end"><?php echo e(__('Confirm Password')); ?>*</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                            <label  class="col-md-12 col-form-label text-md-end"><?php echo app('translator')->get("The fields* are required"); ?></label>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Register')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/auth/register.blade.php ENDPATH**/ ?>