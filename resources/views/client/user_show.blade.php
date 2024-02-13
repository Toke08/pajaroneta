@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
@endsection
<style>
button{
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
    width: 25%;
}
.card button{
    background-color: #E5A200;
    border-radius: 1.5em;
    height: 2em;
    margin-bottom: 3%;
}
#changePassword{
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
}
#changePassword:hover, .card button:hover{
    background-color: #CA8F00;
}
.form-control {
    border-radius: 1.5em;
    border:0.4px solid #000000;
}
.card-body{
        background-image: url('{{asset('img/landing_page/Trucks.png')}}'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 300px 400px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */

}
.card{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius:1em;

}
.card-header{
    border:none;
    text-align: center;
    font-size: 1.2em;
    background-color: #ffff;
}
</style>
@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-white  text-black">
                    @lang("User profile")
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img/users/' . $user->profile_img) }}" alt="Profile Image"
                             class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>@lang("Name"):</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>@lang("Email"):</strong> {{ $user->email }}</li>
                        <!-- No mostrar la contraseña directamente -->
                    </ul>
                </div>

                <form action="{{ route('user_edit', $user->name) }}" method="GET">
                    @csrf
                    <button type="submit">@lang("Edit")</button>
                </form>

                <!-- Botón para abrir el modal -->
                <button id="changePassword" type="button" class="btn">
                   @lang("Change password")
                </button>

                <!-- Modal para cambiar la contraseña -->
                <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
                     aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="changePasswordModalLabel">@lang("Change password")</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <!-- Formulario para cambiar la contraseña -->
                                <form action="{{ route('cambiar_contrasena') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Agrega los campos necesarios (contraseña actual, nueva contraseña, confirmación) -->
                                    <div class="form-group">
                                        <label for="current_password">@lang("Current password")</label>
                                        <input type="password" name="current_password" id="current_password"
                                               class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">@lang("New password")</label>
                                        <input type="password" name="new_password" id="new_password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirmation">@lang("Confirm new password")</label>
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn">@lang("Save changes")</button>
                                    <!-- Botón para cerrar el modal -->
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang("Close") --}}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // JavaScript para abrir el modal cuando se hace clic en el botón
    document.getElementById('changePassword').addEventListener('click', function () {
        $('#changePasswordModal').modal('show');
    });
</script>
@endsection
