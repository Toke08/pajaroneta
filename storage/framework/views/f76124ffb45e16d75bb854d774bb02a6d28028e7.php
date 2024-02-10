<?php $__env->startSection('titulo'); ?>
Vista de <?php echo e($food->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>
/* Estilos para el contenedor principal */
.container {
    display: flex;
    align-items: center;
}

/* Estilos para el texto de alimentos */
.food-text {
    width: 50%; /* Ocupa el 50% del ancho del contenedor */
    float: left; /* Coloca el texto a la izquierda */
    margin-right: 20px; /* Espacio entre el texto y la imagen */
}

/* Estilos para la imagen de alimentos */
.food-image {
    width: 50%; /* Ocupa el 50% del ancho del contenedor */
    float: right; /* Coloca la imagen a la derecha */
}

/* Estilos para la imagen de categoría */
.category-image {
    width: 10%; /* Ocupa el 10% del ancho del contenedor */
    margin-top: 20px; /* Espacio entre el texto y la imagen */
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
    background-color: #CA8F00; /* Usa el mismo color que en :hover */
    border: none;
    border-radius: 1.5em;
    box-shadow: none; /* Elimina la sombra cuando se hace clic */
    padding: 5px;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="food-text">
        <button id="volverAGaleria" class="btn">Volver a la galería</button><br>
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