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
                        <button class="fa-solid fa-pen-to-square btn btn-primary btn-sm btn-editar" data-user-id="<?php echo e($user->id); ?>"></button>
                        <input type="text" class="form-control input-editar" id="input-name-<?php echo e($user->id); ?>" style="display: none;">
                        <button class="btn btn-danger btn-sm btn-cancelar" data-user-id="<?php echo e($user->id); ?>" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </td>
                <td class="editable"><?php echo e($user->email); ?></td>
                <td>
                    <?php if($user->profile_img): ?>
                    <img src="<?php echo e(asset('img/users/' . $user->profile_img)); ?>" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 50px;">
                    <?php else: ?>
                    Sin imagen
                    <?php endif; ?>
                </td>
                <td class="editable">
                    <select class="form-select user-role" data-original-role="<?php echo e($user->role_id); ?>">
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

                    <button class="btn btn-success btn-sm btn-actualizar-individual" data-user-id="<?php echo e($user->id); ?>" data-update-route="<?php echo e(route('user.update', ['user' => $user->id])); ?>"style="margin-left: 5px; display: none;">Actualizar
                    </button>
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
    $(".fa-pen-to-square").click(function () {
        var userId = $(this).data('user-id');

        $("#user-name-" + userId).hide();
        $("#input-name-" + userId).val($("#user-name-" + userId).text()).show();
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").show();
        $(".btn-editar[data-user-id='" + userId + "']").hide();
        $(".btn-cancelar[data-user-id='" + userId + "']").show();
    });

    $(".btn-cancelar").click(function () {
        var userId = $(this).data('user-id');

        // Muestra el texto y oculta el input correspondiente al usuario que se está editando
        $("#user-name-" + userId).show();
        $("#input-name-" + userId).hide();
        // Muestra el botón de editar y oculta el botón de actualizar
        $(".btn-editar[data-user-id='" + userId + "']").show();
        $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();
        // Oculta el botón de cancelar
        $(".btn-cancelar[data-user-id='" + userId + "']").hide();
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
        var updateRoute = $(this).data('update-route');
        var newName = $("#input-name-" + userId).val();
        var selectedRole = $(this).closest('tr').find(".user-role").val();

        // Obtén el token CSRF
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Envía la solicitud Ajax al servidor para actualizar la información
        $.ajax({
            type: 'PUT',
            url: updateRoute,
            data: {
                name: newName,
                role: selectedRole
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                // Manejar la respuesta del servidor si es necesario
                console.log(response);

                // Actualiza la interfaz con la nueva información
                $("#user-name-" + userId).text(newName);

                // Muestra el texto y oculta el input correspondiente al usuario que se está editando
                $("#user-name-" + userId).show();
                $("#input-name-" + userId).hide();

                // Muestra el botón de editar y oculta el botón de actualizar
                $(".btn-editar[data-user-id='" + userId + "']").show();
                $(".btn-actualizar-individual[data-user-id='" + userId + "']").hide();
                // Oculta el botón de cancelar
                $(".btn-cancelar[data-user-id='" + userId + "']").hide();
            },
            error: function (error) {
                // Manejar errores si es necesario
                console.log(error);
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterpage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\RodDAW2\UniServerZ\www\pajaroneta\resources\views/admin/users/index.blade.php ENDPATH**/ ?>