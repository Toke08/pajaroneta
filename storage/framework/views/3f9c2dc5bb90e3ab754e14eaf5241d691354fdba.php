
<?php $__env->startSection('titulo'); ?>
Tags
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
/* Cambiar el color del enlace */
a.enlaceNegro {
        color: #000;
        /* Cambiar a tu color deseado, por ejemplo, negro (#000) */
        text-decoration: none;
        /* Quitar el subrayado */
    }

    /* Cambiar el color cuando el enlace está en estado de foco (haciendo clic) */
    a.enlaceNegro:focus {
        color: #000;
        /* Cambiar a tu color deseado, por ejemplo, negro (#000) */
    }

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

                

                
                    <div class="text-right">
                        <a href="<?php echo e(route('blog.create')); ?>"><button type="button" class="btn btn-primary">Crear nueva categoría
                                </button></a>
                    </div>
                

            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($tag->id); ?></th>
                                            <td><?php echo e($tag->name); ?></td>

                                            <td>
                                                <form action="<?php echo e(route('tags.destroy', $tag->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/tags/index.blade.php ENDPATH**/ ?>