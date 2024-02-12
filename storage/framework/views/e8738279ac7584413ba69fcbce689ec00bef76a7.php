<?php $__env->startSection('estilos'); ?>

<style>
.landing_page {
    display:flex;
    flex-direction:row;
    place-items:center;
    justify-content:center;

}
.part1 img{
    width:45em;
    position: relative;
    margin-left: 20%
}
.papa1 {
    transform:translate(0px, -200px);
}
.papa2 {
    transform:translate(0px, -10px);
}
.part2{
    display:grid;
    place-items:center;
}
.part2 p{
    font-size: 1.5em;
    align-items: center;
}
.part2 img{
    width:45em;
}
.part3 img{
    width: 45em;
    position: relative;
    margin: 0%;
    padding: 0%;
}
.who{
    display: flex;
    flex-direction:row;
    justify-content:center;
    align-items:center;
    color:#000000;
    background-color: #730000;
    color: #ffffff;
    background-position: center;
}
.who_info{
    display: flex;
    flex-direction:column;
}
.who img{
    width:35em;
    height: 25em;
}
</style>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('contenido'); ?>

    <div class="landing_page">
        
        <div class="part2">
            <img src="<?php echo e(asset('img/landing_page/logo_pajar.png')); ?>" alt="">
            <p>Delicias para celiacos e intolerantes a través de toda España</p>
        </div>
        
    </div>

    <div class="who">
        <img src="<?php echo e(asset('img/landing_page/burger_izq.png')); ?>" alt="">
        <div class="who_info">
            <h2>¿Quiénes somos?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
        </div>
        <img src="<?php echo e(asset('img/landing_page/burger_der.png')); ?>" alt="">
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/index.blade.php ENDPATH**/ ?>