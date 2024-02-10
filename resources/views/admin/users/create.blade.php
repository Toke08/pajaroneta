@extends('layout.adminlte-layout')
@section('titulo')
Crear usuario
@endsection

@section('estilos')
<style>
    :root{
    --rojoOscuro:#730000;
    --rojoClaro:#A62224;
    --amarilloOscuro:#CA8F00;
    --amarilloClaro:#E5A200;
    --blanco:#FFFFFF;
    --gris:#F4F4F4;
    --negro:#000000;
}

    /* Cabecera de la tabla */
    body > div > div.content-wrapper > main > div > div{
    background-color: var(--rojoOscuro) !important;
}

</style>
@endsection

@section('contenido')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>




                    <div class="form-group">
                        <label>Select</label>
                        <select name="role_id" id="" class="form-control">
                            <option value="">Seleccione un rol</option>
                            @foreach ($roles as $rol)

                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                        </select>
                    </div>

            {{-- <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div> --}}

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.card -->


@endsection
