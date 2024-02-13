



<?php $__env->startSection('titulo'); ?>
Vista de <?php echo e($food->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
.container {
    display: flex;
    align-items: center;
}

.food-text {
    width: 50%;
    float: left;
    margin-right: 20px;
}
.food-text a {
    color: #000000;
}

.food-image {
    width: 50%;
    float: right;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.category-image {
    width: 10%;
    margin-top: 20px;
}
.btn{
    color: #fff;
    display: flex;
    align-items: flex-end;
    position: fixed;
    background-color: #E5A200;
    border: none;
    border-radius: 1.5em;
    position: relative;
    transition: 0.3s ease-in-out;
}

.btn:hover {
    background-color: #CA8F00;
    border: none;
    border-radius: 1.5em;
    color: #fff;

}

.btn:active {
    background-color: #CA8F00;
    border: none;
    border-radius: 1.5em;
    box-shadow: none;
    padding: 5px;
}
@media only screen and (max-width: 767px) {
    .container {
        flex-direction: column; /* Cambia la dirección de flexión a vertical */
    }

    .food-text, .food-image {
        width: 100%; /* Ocupa todo el ancho del contenedor */
        float: none; /* Elimina el flotado */
        margin-right: 0; /* Elimina el margen derecho */
    }

    .food-text {
        margin-bottom: 20px; /* Agrega espacio entre los elementos */
    }

    .category-image {
        width: 100%; /* Ocupa todo el ancho del contenedor */
        margin-top: 20px; /* Espacio entre el texto y la imagen */
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="food-text">
        <button id="volverAGaleria" class="btn"><?php echo app('translator')->get("Go back"); ?></button><br>
        <a href="<?php echo e(route('galeria_comidas', ['id' => $category->id])); ?>"><?php echo e($category->name); ?> ></a>
        <h1><?php echo e($food->name); ?></h1>
        <p><?php echo e($food->description); ?></p>
        <h2>€<?php echo e($food->price); ?></h2>
    </div>

    <img src="<?php echo e(asset('img/foods') . '/' . $food->img); ?>" alt="<?php echo e($food->name); ?>" class="food-image">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("volverAGaleria").addEventListener("click", function() {
            window.location.href = "<?php echo e(route('galeria_comidas')); ?>";
        });
    });
</script>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/client/galeria_comidas_show.blade.php ENDPATH**/ ?>