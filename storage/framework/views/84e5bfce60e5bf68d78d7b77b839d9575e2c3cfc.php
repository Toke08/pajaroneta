<div class="custom-shape-divider-top-1707134803">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
</div>
<nav class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Pajaroneta</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
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
<?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/layout/nav.blade.php ENDPATH**/ ?>