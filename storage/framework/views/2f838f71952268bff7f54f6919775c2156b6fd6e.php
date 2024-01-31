<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pajaroneta - <?php echo $__env->yieldContent('titulo'); ?></title>

    

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/navbar-top-fixed.css')); ?>" rel="stylesheet">


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

    <?php echo $__env->yieldContent('estilos'); ?>
    <?php echo $__env->yieldContent('contenido'); ?>
    <?php echo $__env->yieldContent('script'); ?>

</main>


<footer>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</footer>



<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <!--   <script src="<?php echo e(asset('css/bootstrap.min.css')); ?>"></script>-->
</body>
</html>
<?php /**PATH G:\UniServerZ\www\pajaroneta\resources\views/layout/masterpage.blade.php ENDPATH**/ ?>