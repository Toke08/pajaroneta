@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('img/users/' . $user->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <!-- No mostrar la contraseña directamente -->
                    </ul>
                </div>

                <!-- Botón para redirigir a la vista de cambiar contraseña -->
                <a href="{{ route('cambiar_contrasena_view') }}" class="btn btn-primary">Cambiar Contraseña</a>

                <!-- Modal para cambiar la contraseña -->
                <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                    <!-- Resto del código del modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
