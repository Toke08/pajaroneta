<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Pajaroneta</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('galeria_comidas')); ?>"><?php echo app('translator')->get('Food Gallery'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('ubicaciones.index')); ?>"><?php echo app('translator')->get('Locations'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('encuentranos.index')); ?>"><?php echo app('translator')->get('Find Us'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->get('Blog'); ?></a>
            </li>

            <?php if(auth()->guard()->guest()): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('Register'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('Login'); ?></a>
    </li>
<?php else: ?>
    <?php if(auth()->user()->isAdmin()): ?>
        <!-- Si es un administrador, redirigir al dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('adminHome')); ?>"><?php echo app('translator')->get('Hello,'); ?> <?php echo e(auth()->user()->name); ?></a>
        </li>

    <?php else: ?>
        <!-- Si no es un administrador, mostrar el nombre del usuario -->
        <li class="nav-item">
            <a class="nav-link text-white" href="<?php echo e(route('user_show', ['name' => auth()->user()->name])); ?>"><?php echo app('translator')->get('Hello,'); ?> <?php echo e(auth()->user()->name); ?></a>
        </li>
    <?php endif; ?>

    <!-- Común para usuarios y administradores -->
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();"><?php echo app('translator')->get('Logout'); ?></a>
        <form id="logout" action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
        </form>
    </li>
<?php endif; ?>

        </ul>
        <span class="text-white">
            <a href="<?php echo e(route('setLanguage','es')); ?>">ES</a>
            <a href="<?php echo e(route('setLanguage','eu')); ?>">EU</a>
            <a href="<?php echo e(route('setLanguage', 'en')); ?>">EN</a>
        </span>
    </div>
</nav>
<?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/layout/nav.blade.php ENDPATH**/ ?>