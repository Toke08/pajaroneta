@extends('layout.masterpage')

@section('titulo')
@endsection

@section('estilos')
<style>

button input{
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
}
#changePassword:hover{
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
@endsection

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header text-black">
                    @lang("User profile")
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
                            <label for="image">@lang( "Change profile pic")</label>
                                    <input type="file" name="img">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>@lang("Name"):</strong> <input type="text" id="name" name="name" value="{{ $user->name }}" required></li>
                                <li class="list-group-item"><strong>@lang("Email"):</strong> {{ $user->email }}</li>
                                <!-- No mostrar la contraseña directamente -->
                            </ul>
                        </div>
                        <button>
                            <input type="submit" value=@lang("Update")>
                        </button>


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
