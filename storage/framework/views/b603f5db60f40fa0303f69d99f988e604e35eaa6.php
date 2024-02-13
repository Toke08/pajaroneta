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
.card{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius:1em;

}
.card-body{
        background-image: url('<?php echo e(asset('img/landing_page/Trucks.png')); ?>'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 250px 350px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */
        display:flex;
        flex-direction:column;
        justify-content:center;
        place-items:center;

}

.card-header{
    border:none;
    text-align: center;
    font-size: 1.2em;
    background-color: #ffff;
}
.input{
    border: none;
    border-bottom:1px solid black;
}
input:focus {
    outline: none;
    border: none;
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 justify-content-center text-align-center ">
            <div class="card ">
                <div class="card-header"><?php echo e(__('Login')); ?></div>

                <div class="card-body justify-content-center text-align-center ">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3 col">
                            <label for="email" class="col-md-10 col-form-label"><?php echo e(__('Email Address')); ?>:</label>

                            <div class="col-md-15">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

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

                        <div class="mb-3 col">
                            <label for="password" class="col-md-10 col-form-label text-md-end"><?php echo e(__('Password')); ?>:</label>

                            <div class="col-md-15">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

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

                        <div class="mb-3 row">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 col">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Login')); ?>

                                </button>
                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link col" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>

                                <div class="row m0">
                                    <p><?php echo app('translator')->get("No account?"); ?></p>
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('Register'); ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/auth/login.blade.php ENDPATH**/ ?>