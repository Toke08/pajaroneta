@extends('layout.masterpage')


@section('estilos')
<style>

.btn-primary {
    border-radius: 1.5em;
    background-color: #E5A200;
    border: none;
    color: white;
}
.btn-primary:hover{
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
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card text-align-center">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 ">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                            <div class="col-md-6 justify-content-center text-center">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link col" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <div class="question">
                                    <p>¿No tienes una cuenta?</p>
                                    <a class="nav-link" href="{{ route('register') }}">@lang('Register')</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
