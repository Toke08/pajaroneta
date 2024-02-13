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
            <a href="<?php echo e(route('user.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?php echo e(route('blog.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?php echo e(route('galeria-comidas.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
</Section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>