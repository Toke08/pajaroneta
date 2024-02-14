@extends('layout.masterpage')

@section('estilos')

<style>
.btn-primary {
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
    width: 100%;
}
.btn-primary:hover{
    background-color: #CA8F00;
}
.form-control {
    border-radius:1.5em;
}
.card-body{
        background-image: url('{{asset('img/landing_page/Trucks.png')}}'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 300px 400px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */
        display:flex;
        flex-direction:column;
        /* justify-content:center; */
        place-items:center;
}
.card{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius:1em;

}
.question{
    display: flex;
    flex-direction: row;
    align-items: center;
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
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 justify-content-center align-items-center">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="profile_img" value="user_default.jpg">

                        <div class="col mb-3">
                            <label for="name" class="col-md-12 col-form-label text-md-end">{{ __('Name') }}*</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="email" class="col-md-10 col-form-label text-md-end">{{ __('Email Address') }}*</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password') }}*</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mínimo 8 caracteres">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-end">{{ __('Confirm Password') }}*</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div>
                            <label  class="col-md-12 col-form-label text-md-end">@lang("The fields* are required")</label>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
