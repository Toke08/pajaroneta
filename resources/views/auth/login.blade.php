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
.card{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    border-radius:1em;

}
.card-body{
        background-image: url('{{asset('img/landing_page/Trucks.png')}}'); /* Reemplaza 'ruta-de-tu-imagen.jpg' con la ruta de tu imagen de fondo */
        background-size: 250px 350px; /* Ajusta el tamaño de la imagen para cubrir todo el contenedor */
        background-position: :right; /* Centra la imagen en el contenedor */
        background-repeat: no-repeat; /* Evita que la imagen se repita en el contenedor */
        display:flex;
        flex-direction:column;
        justify-content:center;
        place-items:center;

}

.card-header{
    border:none;
    text-align: center;
    font-size: 1.2em;
    background-color: #ffff;
}
.input{
    border: none;
    border-bottom:1px solid black;
}
input:focus {
    outline: none;
    border: none;
}
.reg a{
    padding-left: 2%;
}
</style>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 justify-content-center text-align-center ">
            <div class="card ">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body justify-content-center text-align-center ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3 col">
                            <label for="email" class="col-md-10 col-form-label">{{ __('Email Address') }}:</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 col">
                            <label for="password" class="col-md-10 col-form-label text-md-end">{{ __('Password') }}:</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row ml-5">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-0 col">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link col" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                                <div class="row justify-content-center">
                                    <p>@lang("No account?")</p>
                                    <a class="reg" href="{{ route('register') }}">@lang('Register')</a>
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
