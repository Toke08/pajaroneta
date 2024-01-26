<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="<?php echo e(asset('css/general.css')); ?>">



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


    <?php echo $__env->yieldContent('contenido'); ?>
    <?php echo $__env->yieldContent('estilos'); ?>
</main>


<footer>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>




</body>
</html>
<?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/layout/masterpage.blade.php ENDPATH**/ ?>