
<?php $__env->startSection('titulo'); ?>
Editar Plato
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


    .sbx-medium {
        display: inline-block;
        position: relative;
        width: 200px;
        height: 37px;
        white-space: nowrap;
        box-sizing: border-box;
        font-size: 13px;
    }

    .sbx-medium__wrapper {
        width: 100%;
        height: 100%;
    }

    .sbx-medium__input {
        display: inline-block;
        -webkit-transition: box-shadow .4s ease, background .4s ease;
        transition: box-shadow .4s ease, background .4s ease;
        border: 0;
        border-radius: 7px;
        box-shadow: inset 0 0 0 1px #D9D9D9;
        background: #FFFFFF;
        padding: 0;
        padding-right: 30px;
        padding-left: 37px;
        width: 100%;
        height: 100%;
        vertical-align: middle;
        white-space: normal;
        font-size: inherit;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .sbx-medium__input::-webkit-search-decoration,
    .sbx-medium__input::-webkit-search-cancel-button,
    .sbx-medium__input::-webkit-search-results-button,
    .sbx-medium__input::-webkit-search-results-decoration {
        display: none;
    }

    .sbx-medium__input:hover {
        box-shadow: inset 0 0 0 1px silver;
    }

    .sbx-medium__input:focus,
    .sbx-medium__input:active {
        outline: 0;
        box-shadow: inset 0 0 0 1px #AAAAAA;
        background: #FFFFFF;
    }

    .sbx-medium__input::-webkit-input-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input::-moz-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input:-ms-input-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input::placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__submit {
        position: absolute;
        top: 0;
        right: inherit;
        left: 0;
        margin: 0;
        border: 0;
        border-radius: 18px 0 0 18px;
        background-color: rgba(255, 255, 255, 0);
        padding: 0;
        width: 37px;
        height: 100%;
        vertical-align: middle;
        text-align: center;
        font-size: inherit;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .sbx-medium__submit::before {
        display: inline-block;
        margin-right: -4px;
        height: 100%;
        vertical-align: middle;
        content: '';
    }

    .sbx-medium__submit:hover,
    .sbx-medium__submit:active {
        cursor: pointer;
    }

    .sbx-medium__submit:focus {
        outline: 0;
    }

    .sbx-medium__submit svg {
        width: 17px;
        height: 17px;
        vertical-align: middle;
        fill: #666666;
    }

    .sbx-medium__reset {
        display: none;
        position: absolute;
        top: 8px;
        right: 8px;
        margin: 0;
        border: 0;
        background: none;
        cursor: pointer;
        padding: 0;
        font-size: inherit;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        fill: rgba(0, 0, 0, 0.5);
    }

    .sbx-medium__reset:focus {
        outline: 0;
    }

    .sbx-medium__reset svg {
        display: block;
        margin: 4px;
        width: 13px;
        height: 13px;
    }

    .sbx-medium__input:valid~.sbx-medium__reset {
        display: block;
        -webkit-animation-name: sbx-reset-in;
        animation-name: sbx-reset-in;
        -webkit-animation-duration: .15s;
        animation-duration: .15s;
    }

    @-webkit-keyframes sbx-reset-in {
        0% {
            -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
            opacity: 0;
        }

        100% {
            -webkit-transform: none;
            transform: none;
            opacity: 1;
        }
    }

    @keyframes sbx-reset-in {
        0% {
            -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
            opacity: 0;
        }

        100% {
            -webkit-transform: none;
            transform: none;
            opacity: 1;
        }
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="card card-primary">
    <form action="<?php echo e(route('galeria-comidas.update', $food->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nombre *</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo e($food->name); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción *</label>
                <textarea class="form-control" id="description" name="description" rows="4" cols="50"
                    required><?php echo e($food->description); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Precio *</label>
                <input class="form-control" type="text" id="price" name="price" value="<?php echo e($food->price); ?>" required>
            </div>
            <div class="form-group">
                <label for="categories">Categoría *</label>
                <select class="form-control" name="category_id" id="">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($category->id == $food->category->id) { echo("selected"); } ?>
                        value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">

                <label for="image">Imagen actual:</label><br>
                <img src="<?php echo e(asset('img/foods')); ?>/<?php echo e($food->img); ?>" style="max-width: 200px;"><br>
            </div>
            <div class="form-group">
                <label for="image">Imagen *</label>
                <div class="custom-file">

                    <input type="file" class="custom-file-input" id="customFile" name="img">
                    <label class="custom-file-label" for="customFile">Elegir imagen</label>
                </div>
            </div>


                <button type="submit" class="btn btn-primary">Guardar</button>



        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\axelb\OneDrive\Escritorio\UniServerZ\www\pajaroneta\resources\views/admin/foods/edit.blade.php ENDPATH**/ ?>