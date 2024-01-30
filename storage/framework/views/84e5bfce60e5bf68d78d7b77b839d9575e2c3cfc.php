<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Pajaroneta</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('galeria-comidas.index')); ?>"><?php echo app('translator')->get('Food Gallery'); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('ubicaciones.index')); ?>"><?php echo app('translator')->get('Locations'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('encuentranos.index')); ?>"><?php echo app('translator')->get('Find Us'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('categorias.index')); ?>"><?php echo app('translator')->get('View Food Categories'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('blog.index')); ?>"><?php echo app('translator')->get('Blog'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('blog.create')); ?>"><?php echo app('translator')->get('Create Post'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('tags.index')); ?>"><?php echo app('translator')->get('View Blog Categories'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('tags.create')); ?>"><?php echo app('translator')->get('Create Blog Category'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('restaurants.create')); ?>"><?php echo app('translator')->get('New Restaurant'); ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('restaurants.index')); ?>"><?php echo app('translator')->get('View Restaurants'); ?></a>
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
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('blog.create')); ?>"><?php echo app('translator')->get('Admin Panel'); ?></a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();"><?php echo app('translator')->get('Logout'); ?></a>
            <form id="logout" action="<?php echo e(route('logout')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
            </form>
          </li>
          <?php endif; ?>
        </ul>
        <span  class="text-white">
            <a  href="<?php echo e(route('setLanguage','es')); ?>">ES</a>
            <a  href="<?php echo e(route('setLanguage','eu')); ?>">EU</a>
            <a href="<?php echo e(route('setLanguage', 'en')); ?>">EN</a>


        </span>
      </div>
    </nav>
<?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/layout/nav.blade.php ENDPATH**/ ?>