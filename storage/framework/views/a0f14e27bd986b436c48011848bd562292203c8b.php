<?php $__env->startSection('contenido'); ?>
    <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>">
    <h1><?php echo e($post->title); ?></h1>
    <a href="<?php echo e(route('tags.show', $post->tag)); ?>"><?php echo e($post->tag->name); ?></a><br>
    <p><?php echo e($post->content); ?></p>
    <a href="<?php echo e(route('blog')); ?>">Volver al blog</a>


        <!-- Agregar formulario para comentarios -->
        <form action="<?php echo e(route('comments.store', ['post_id' => $post->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="comment" class="form-label">Agregar Comentario:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>

        <!-- Mostrar comentarios existentes -->
        <h3>Comentarios:</h3>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($comment->user->name); ?> dijo: <?php echo e($comment->comment); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rod\Desktop\Desk\DAW\UniServerZ\www\pajaroneta\resources\views/admin/blog/show.blade.php ENDPATH**/ ?>