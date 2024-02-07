@extends('adminlte::page')

@section('titulo')
@endsection

@section('css')
<style>

</style>
@endsection

@section('content')
<a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
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
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <div class="user-info-container">
                        <span class="editable" id="user-name-{{ $user->id }}">{{ $user->name }}</span>
                        <button class="fa-solid fa-pen-to-square btn btn-primary btn-sm btn-editar-name" data-user-id="{{ $user->id }}"></button>
                        <input type="text" class="form-control input-editar-name" id="input-name-{{ $user->id }}" style="display: none;">
                        <button class="btn btn-danger btn-sm btn-cancelar-name" data-user-id="{{ $user->id }}" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </td>
                <td>
                    <div class="user-info-container">
                        <span class="editable" id="user-email-{{ $user->id }}">{{ $user->email }}</span>
                        <button class="fa-solid fa-pen-to-square btn btn-primary btn-sm btn-editar-email" data-user-id="{{ $user->id }}"></button>
                        <input type="email" class="form-control input-editar-email" id="input-email-{{ $user->id }}" style="display: none;">
                        <button class="btn btn-danger btn-sm btn-cancelar-email" data-user-id="{{ $user->id }}" style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </td>
                <td>
                    @if ($user->profile_img)
                    <img src="{{ asset('img/users/' . $user->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 50px;">
                    @else
                    Sin imagen
                    @endif
                </td>
                <td class="editable">
                    <select class="form-select user-role" data-original-role="{{ $user->role_id }}">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                    </form>

                    <button class="btn btn-success btn-sm btn-actualizar-individual" data-user-id="{{ $user->id }}" data-update-route="{{ route('user.update', ['user' => $user->id]) }}" style="margin-left: 5px; display: none;">Actualizar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
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
});
</script>
@endsection
