

<?php $__env->startSection('titulo'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo e(count($users)); ?></h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <a href="<?php echo e(route('user.index')); ?>" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                
              <h3><?php echo e(count($posts)); ?></h3>

              <p>Posts publicados</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <a href="<?php echo e(route('blog.index')); ?>" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo e(count($foods)); ?></h3>

              <p>Comidas en venta</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <a href="<?php echo e(route('galeria-comidas.index')); ?>" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <!-- small box -->
            <div class="card">
                <div class="card-body">
                    <h3>Post más buscado</h3>

                    <?php if($postMasBuscado): ?>
                        <img src="<?php echo e(asset('img/posts/'.$postMasBuscado->img)); ?>" class="img-fluid mb-3" alt="Imagen del post">
                        <h4 class="card-text">Título: <?php echo e(\Illuminate\Support\Str::limit($postMasBuscado->title, 50)); ?></h4>
                        <p class="card-text">Contenido: <?php echo e(\Illuminate\Support\Str::limit($postMasBuscado->content, 200)); ?></p>
                        <p class="card-text">Número de vistas: <?php echo e($postMasBuscado->views); ?></p>
                    <?php else: ?>
                        <p class="card-text">No hay posts disponibles.</p>
                    <?php endif; ?>
                </div>

                <div class="card-footer">
                    <a href="<?php echo e(route('blog_show', ['id' => $comidaMasBuscada->id])); ?>" class="btn btn-primary">Ver más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <!-- small box -->
            <div class="card">
                <div class="card-body">
                    <h3>Comida más buscada</h3>

                    <?php if($comidaMasBuscada): ?>
                        <img src="<?php echo e(asset('img/foods/'.$comidaMasBuscada->img)); ?>" class="img-fluid mb-3" alt="Imagen del post">
                        <h4 class="card-text">Título: <?php echo e(\Illuminate\Support\Str::limit($comidaMasBuscada->name, 50)); ?></h4>
                        <p class="card-text">Contenido: <?php echo e(\Illuminate\Support\Str::limit($comidaMasBuscada->description, 200)); ?></p>
                        <p class="card-text">Número de vistas: <?php echo e($comidaMasBuscada->views); ?></p>
                    <?php else: ?>
                        <p class="card-text">No hay posts disponibles.</p>
                    <?php endif; ?>
                </div>

                <div class="card-footer">
                    <a href="<?php echo e(route('galeria-comidas.show', ['id' => $comidaMasBuscada->id])); ?>" class="btn btn-primary">Ver más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
</Section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>