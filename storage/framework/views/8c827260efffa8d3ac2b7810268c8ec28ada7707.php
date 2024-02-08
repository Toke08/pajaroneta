<?php $__env->startSection('titulo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('estilos'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<a href="<?php echo e(route('adminHome')); ?>">Volver al panel de administrador</a>
<h1>Pajarusuarios</h1>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Imagen de Perfil</th>
                <th>Rol</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user->id); ?></td>
                <td>
                    <div class="user-info-container">
                        <span class="editable" id="user-name-<?php echo e($user->id); ?>"><?php echo e($user->name); ?></span>
                        <button class="fa-solid fa-pen-to-square btn btn-primary btn-sm btn-editar-name" data-user-id="<?php echo e($user->id); ?>"></button>
                        <input type="text" class="form-control input-editar-name" id="input-name-<?php echo e($user->id); ?>" name="name" style="display: none;">
                        <button class="btn btn-danger btn-sm btn-cancelar-name" data-user-id="<?php echo e($user->id); ?>" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </td>
                <td>
                    <div class="user-info-container">
                        <span class="editable" id="user-email-<?php echo e($user->id); ?>"><?php echo e($user->email); ?></span>
                        <button class="fa-solid fa-pen-to-square btn btn-primary btn-sm btn-editar-email" data-user-id="<?php echo e($user->id); ?>"></button>
                        <input type="email" class="form-control input-editar-email" id="input-email-<?php echo e($user->id); ?>" name="email" style="display: none;">
                        <button class="btn btn-danger btn-sm btn-cancelar-email" data-user-id="<?php echo e($user->id); ?>" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </td>
                <td>
                    <?php if($user->profile_img): ?>
                    <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 50px;">
                    <?php else: ?>
                    Sin imagen
                    <?php endif; ?>
                </td>
                <td class="editable">
                    <select class="form-select user-role" data-original-role="<?php echo e($user->role_id); ?>" name="role_id">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->id); ?>" <?php echo e($user->role_id === $role->id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
                <td><?php echo e($user->created_at->format('Y-m-d')); ?></td>
                <td>
                    <form action="<?php echo e(route('user.destroy', ['user' => $user->id])); ?>" method="post" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                    </form>

                    <form id="update-user-form-<?php echo e($user->id); ?>" action="<?php echo e(route('user.update', ['id' => $user->id])); ?>" method="put">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('put'); ?>
                        <button type="submit" class="btn btn-success btn-sm btn-actualizar-individual"
                                data-user-id="<?php echo e($user->id); ?>"
                                style="margin-left: 5px; display: none;">Actualizar</button>
                    </form>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>

$(document).ready(function () {
    $(".btn-editar-name").click(function () {
        var userId = $(this).data('user-id');

        // Esconder el span y mostrar el input correspondiente al nombre
        $("#user-name-" + userId).hide();
        $("#input-name-" + userId).val($("#user-name-" + userId).text()).show();

        // Mostrar botones de actualizar y esconder botones de editar
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").show();
        $(".btn-editar-name[data-user-id='" + userId + "']").hide();

        // Mostrar botón de cancelar correspondiente
        $(".btn-cancelar-name[data-user-id='" + userId + "']").show();
    });

    $(".btn-editar-email").click(function () {
        var userId = $(this).data('user-id');

        // Esconder el span y mostrar el input correspondiente al email
        $("#user-email-" + userId).hide();
        $("#input-email-" + userId).val($("#user-email-" + userId).text()).show();

        // Mostrar botones de actualizar y esconder botones de editar
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").show();
        $(".btn-editar-email[data-user-id='" + userId + "']").hide();

        // Mostrar botón de cancelar correspondiente
        $(".btn-cancelar-email[data-user-id='" + userId + "']").show();
    });

    $(".btn-cancelar-name").click(function () {
        var userId = $(this).data('user-id');

        // Esconder el input y mostrar el span correspondiente al nombre
        $("#input-name-" + userId).hide();
        $("#user-name-" + userId).show();

        // Mostrar botones de editar y esconder botones de actualizar
        $(".btn-editar-name[data-user-id='" + userId + "']").show();
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();

        // Esconder botón de cancelar
        $(".btn-cancelar-name[data-user-id='" + userId + "']").hide();
    });

    $(".btn-cancelar-email").click(function () {
        var userId = $(this).data('user-id');

        // Esconder el input y mostrar el span correspondiente al email
        $("#input-email-" + userId).hide();
        $("#user-email-" + userId).show();

        // Mostrar botones de editar y esconder botones de actualizar
        $(".btn-editar-email[data-user-id='" + userId + "']").show();
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();

        // Esconder botón de cancelar
        $(".btn-cancelar-email[data-user-id='" + userId + "']").hide();
    });

    $(".user-role").change(function () {
        var userId = $(this).closest('tr').find(".fa-pen-to-square").data('user-id');
        var originalRole = $(this).data('original-role');
        var selectedRole = $(this).val();

        // Muestra el botón de actualizar si la opción seleccionada es diferente a la original
        if (originalRole != selectedRole) {
            $(".btn-actualizar-individual[data-user-id='" + userId + "']").show();
        } else {
            $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();
        }
    });

    $(".btn-actualizar-individual").click(function () {
    var userId = $(this).data('user-id');
    var newName = $("#input-name-" + userId).val();
    var newEmail = $("#input-email-" + userId).val();
    var newRole = $("#user-role-" + userId).val();

    $.ajax({
        url: $(this).data('update-route'),
        method: 'PUT',
        data: {
            name: newName,
            email: newEmail,
            role: newRole
        },
        success: function(response) {
            // Actualizar la interfaz con los nuevos datos
            $("#user-name-" + userId).text(newName);
            $("#user-email-" + userId).text(newEmail);
            // Actualizar el rol si es necesario
            if ($("#user-role-" + userId).data('original-role') !== newRole) {
                // Lógica para actualizar el rol
            }
            // Ocultar botón de actualizar
            $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();
            // Mostrar botones de editar
            $(".btn-editar-name[data-user-id='" + userId + "']").show();
            $(".btn-editar-email[data-user-id='" + userId + "']").show();
        },
        error: function(xhr, status, error) {
            // Manejar errores si es necesario
        }
    });
});
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/admin/users/index.blade.php ENDPATH**/ ?>