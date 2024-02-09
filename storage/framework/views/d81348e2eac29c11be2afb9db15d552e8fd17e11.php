

<?php $__env->startSection('titulo'); ?>
    Comidas
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
    table img {
            width: 100px;
            height: auto;
        }





</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>


<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>nombre</th>
                      <th>precio</th>
                      <th>imagen</th>
                      <th>descripcion</th>
                      <th>categoria</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
  <tbody>


        <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($food->id); ?></th>
            <td><a href="<?php echo e(route('galeria-comidas.show', ['id' => $food->id])); ?>"><?php echo e($food->name); ?></a></td>
            <td><?php echo e($food->price); ?></td>
            <td><img src="<?php echo e(asset('img/foods/'.$food->img)); ?>"></td>
            <td><?php echo e($food->description); ?></td>
            <td><?php echo e($food->category->name); ?></td>
            <td>
                <form action="<?php echo e(route('galeria-comidas.edit', $food->id)); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Editar</button>
                </form>

                <form action="<?php echo e(route('galeria-comidas.destroy', $food->id)); ?>"   method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/admin/foods/index.blade.php ENDPATH**/ ?>