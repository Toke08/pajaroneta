<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link href="<?php echo e(asset('css/navbar-top-fixed.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/general.css')); ?>" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <?php echo $__env->yieldContent('estilos'); ?>
    <style>
        main *{
            box-sizing: border-box;
            margin: 0 auto;
            padding: 0;
        }
        table img {
            width: 100px;
            height: auto;
        }

        .admin-container{
                display: flex;
                flex-direction: row;

            }

        .admin-sidebar{
            min-width:  30%;
            min-height: 100vh;
        }

    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <!-- Aquí puedes incluir contenido para la barra lateral del panel de administración -->
            <ul>
                <li><a href="#">Usuarios</a></li>
                <li><a href="<?php echo e(route('galeria-comidas.index')); ?>"><?php echo app('translator')->get('Comidas'); ?></a></li>
                <li><a href="<?php echo e(route('blog.index')); ?>"><?php echo app('translator')->get('Posts'); ?></a></li>
                <li><a href="#">Calendiario</a></li>
            </ul>
        </div>
        <div class="admin-content">
            <div class="admin-header">
                <!-- Aquí puedes incluir contenido para la cabecera del panel de administración -->
                <h2>Panel de Administración</h2>
            </div>
            <div class="admin-main-content">
                <?php echo $__env->yieldContent('contenido'); ?>
            </div>
        </div>
    </div>

    <!-- JS de Bootstrap (popper.js y Bootstrap JS) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/layout/admin-layout.blade.php ENDPATH**/ ?>