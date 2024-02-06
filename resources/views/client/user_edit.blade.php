@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
@endsection

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <form action="{{route('user_update', $user->name)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('img/users/' . $user->profile_img) }}" alt="Profile Image"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 150px;">
                                    {{-- cambiar imagen --}}
                            </div>
                            <label for="image">Cambiar imagen:</label>
                                    <input type="file" name="img">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Name:</strong> <input type="text" id="name" name="name" value="{{ $user->name }}" required></li>
                                <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                <!-- No mostrar la contraseña directamente -->
                            </ul>
                        </div>

                        <input type="submit" value="Actualizar">

                </form>
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
