<?php $__env->startSection('titulo'); ?>
Ubicaciones
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
h1{
    font-family: 'Quicksand', sans-serif;
}
#ubicaciones{
    display: flex;
    flex-direction: column;
    border: 2px solid #000000;
    border-radius: 10px;
    font-family: 'Quicksand', sans-serif;
}
.ubi_title{
    background-color:#A62224;
    color: #ffffff;
    display: flex;
    flex-direction:row;
    border-bottom: 2px solid #000000;
}
label, .ubi_info p{
    width: 30%;
    margin:2%
}
.ubi_info{
    color: #000000;
    display: flex;
    flex-direction:row;
}

/* botones */
button{
    width: 80px;
    height: 45px;
    border-radius: 20px;
    background-color: #A62224;
    color: #ffffff;
    border: none;
    margin: 5%
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<h1>Tus ubicaciones</h1>
<p>Estas son tus ubicaciones que usarás para asignar a tus eventos</p>
<div id="ubicaciones">
    <div class="ubi_title">
        <label>Dirección</label>
        <label>Provincia</label>
        <label>Ciudad</label>
        <label>Código postal</label>
        <label>Eliminar</label>
        <label>Editar</label>
    </div>
    <div>
        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="ubi_info">
            
            <p><?php echo e($location->address); ?></p>
            <p><?php echo e($location->province); ?></p>
            <p><?php echo e($location->city); ?></p>
            <p><?php echo e($location->cp); ?></p>

            <form action="<?php echo e(route('ubicaciones.destroy', $location->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="button" class="btn-delete" data-location-id="<?php echo e($location->id); ?>">Eliminar</button>
            </form>
            <form action="<?php echo e(route('ubicaciones.edit', $location->id)); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <button type="submit">Editar</button>
            </form>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!--
<script>
     const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const locationId = this.getAttribute('data-location-id');
        const mensaje = confirm("¿Deseas eliminar esta ubicación? Se borrarán los eventos relacionados con dicha información");

        if (mensaje) {
            //no se a donde redirigir

        }
    });
});
</script>-->
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/locations/index.blade.php ENDPATH**/ ?>