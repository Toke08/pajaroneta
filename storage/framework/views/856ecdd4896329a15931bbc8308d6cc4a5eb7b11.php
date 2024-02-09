
<?php $__env->startSection('estilos'); ?>
<style>

.post-container {
    display: flex;
    flex-direction: column;
}

.post-image {
    left: 0;
    top: 0;
    position: absolute;
    width: 100%;
    max-height: 400px;
    object-fit: cover;
}

#content {
    margin-top: 20em;
    position: relative;
}

#comentarios{
    border-top: 2px solid #000;
    padding-top: 1em;
}

.btn-primary{
    background-color:#E5A200;
    border: none;
    border-radius: 1.5em;
    position: absolute;
    right: 0;
}

.btn-primary:hover{
    background-color:#CA8F00;
    border: none;
    border-radius: 1.5em;
}

.form-control{
    border:none;
    background-color:#F4F4F4;
}

.form-control:focus{
    border:none;
    background-color:#F4F4F4;
}

.post-comments {
    display: flex;
    flex-direction: column;
}

.comment-container {
    display: flex;
    align-items: flex-start;
    margin-bottom: 10px;
}

.comment-details {
    margin-left: 10px;
}

.comment-details strong {
    font-weight: bold;
}

.comment-details p {
    margin: 0;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="post-container">
    <img src="<?php echo e(asset('img/posts') . '/' . $post->img); ?>" alt="<?php echo e($post->title); ?>" class="post-image">
    <div id="content">
        <a href="<?php echo e(route('tags_show', $post->tag)); ?>"><?php echo e($post->tag->name); ?></a><br>

        <button id="volverAlBlog" class="btn btn-primary">Volver al blog</button>
        
        <h1><?php echo e($post->title); ?></h1>
        <p class="post-content"><?php echo e($post->content); ?></p>

        <!-- Agregar formulario para comentarios -->
        <form id="comentarios" action="<?php echo e(route('comments.store', ['post_id' => $post->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <h3 for="comment" class="form-label">Deja un comentario:</h3>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
            <button type="submit" class="btn btn-primary">Comentar</button>
        </form>

        <div class="post-comments">
            <?php $__currentLoopData = $comments->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment-container">
                    <img src="<?php echo e(asset('img/users') . '/' . $comment->user->profile_img); ?>" width="50px" style="border-radius:50%;">
                    <div class="comment-details">
                        <strong class="comment"><?php echo e($comment->user->name); ?></strong>
                        <p><?php echo e($comment->comment); ?></p>
                        <p><?php echo e($comment->created_at->format('Y-m-d')); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script>
     document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("volverAlBlog").addEventListener("click", function() {
            window.location.href = "<?php echo e(route('blog')); ?>";
        });
    });

    $(document).ready(function() {
        $('#comment').keypress(function(event) {
            // Verifica si la tecla presionada es la tecla "Enter" (código 13)
            if (event.keyCode === 13 && !event.shiftKey) {
                event.preventDefault(); // Evita que se ejecute la acción predeterminada de la tecla "Enter"
                $('#comentarios').submit(); // Envía el formulario
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\UniServerZ\www\pajaroneta\resources\views/client/blog_show.blade.php ENDPATH**/ ?>