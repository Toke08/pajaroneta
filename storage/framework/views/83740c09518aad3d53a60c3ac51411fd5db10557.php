<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Pajaroneta</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('galeria-comidas.index')); ?>"><?php echo e(__('Galería de comidas')); ?></a>
          </li>
          <li class="nav-item">
<<<<<<< Updated upstream
            <a class="nav-link" href="<?php echo e(route('ubicaciones.index')); ?>"><?php echo e(__('Encuéntranos')); ?></a>
=======
            <a class="nav-link" href="<?php echo e(route('categorias.index')); ?>"><?php echo e(__('Ver categorías comida')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('encuentranos.index')); ?>"><?php echo e(__('Encuéntranos')); ?></a>
>>>>>>> Stashed changes
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('blog.index')); ?>"><?php echo e(__('Blog')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('blog.create')); ?>"><?php echo e(__('Crear publicación')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('tags.index')); ?>"><?php echo e(__('Ver categorías blog')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('tags.create')); ?>"><?php echo e(__('Crear categoría blog')); ?></a>
          </li>
          <?php if(auth()->guard()->guest()): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
          </li>

          <?php else: ?>
          <?php if(auth()->user()->isAdmin()): ?>
            <li class="nav-item active">
                <a class="nav-link" href="#">Lista de roles <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Lista de cartas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('blog.create')); ?>"><?php echo e(__('Panel dmin')); ?></a>
            </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
            <form id="logout" action="<?php echo e(route('logout')); ?>" method="POST" >
                <?php echo csrf_field(); ?>
            </form>
          </li>
          <?php endif; ?>
        </ul>
        <span  class="text-white">
            <a  href="#">ES</a>
            <a  href="#">EU</a>
        </span>
      </div>
    </nav>
<?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/layout/nav.blade.php ENDPATH**/ ?>