
<?php $__env->startSection('titulo'); ?>
Ubicación nueva
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
h1{
    font-family: 'Quicksand', sans-serif;

}
.ubi_for input{
    border-radius: 30px;
    border: none;
    margin: 2%;
    height: 50px;
    width:80%;
    background: #F4F4F4;
    padding: 2%;
    font-family: 'Quicksand', sans-serif;
}
.ubi_btn input{
    width: 30%;
    height: 50px;
    border-radius: 20px;
    background-color: #A62224;
    color: #ffffff;
    border: none;
    margin: 2%;
    font-family: 'Quicksand', sans-serif;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<h1>Nueva ubicación</h1>

    <form action="<?php echo e(route('ubicaciones.store')); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="ubi_for">
            <input type="text" id="address" name="address" placeholder="Dirección" required>
        </div>

        <div class="ubi_for">
            <input type="text" id="province" name="province" placeholder="Provincia" required>
        </div>
       <div class="ubi_for">
            <input type="text" id="city" name="city" placeholder="Ciudad" required>
       </div>
       <div class="ubi_for">
            <input type="text" inputmode="numeric" id="cp" name="cp" placeholder="Código postal" required>
       </div>
       <div class="ubi_btn">
            <input type="submit" name="" id="" value="Crear ubicación">
       </div>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/locations/create.blade.php ENDPATH**/ ?>