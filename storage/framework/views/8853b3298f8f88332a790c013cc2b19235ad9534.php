<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pajaroneta - <?php echo $__env->yieldContent('titulo'); ?></title>

    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="<?php echo e(asset('css/navbar-top-fixed.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/general.css')); ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

    <?php echo $__env->yieldContent('estilos'); ?>
</head>

<body>
    <header>
        <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>

    <main role="main" class="container">
        <!-- mensajes flash -->
        <?php if(Session::has('message')): ?>
            <div class="alert alert-info" role="alert">
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>

        <!-- errores de validador -->
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo e($error); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php echo $__env->yieldContent('estilos'); ?>
        <?php echo $__env->yieldContent('contenido'); ?>
        <?php echo $__env->yieldContent('script'); ?>
    </main>

    <footer>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

    <!-- JS de Bootstrap (popper.js y Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery -->
</body>
</html>
<?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/layout/masterpage.blade.php ENDPATH**/ ?>