<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <?php echo $__env->yieldContent('estilos'); ?>
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <!-- Aquí puedes incluir contenido para la barra lateral del panel de administración -->
            <ul>
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Comidas</a></li>
                <li><a href="#">Posts</a></li>
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

    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/layout/admin-layout.blade.php ENDPATH**/ ?>