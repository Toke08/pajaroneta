@extends('layout.adminlte-layout')

@section('titulo')
Categorias de comidas
@endsection

@section('estilos')
<style>

    /* Cambiar el color del enlace */
    a.enlaceNegro {
        color: #000;
        /* Cambiar a tu color deseado, por ejemplo, negro (#000) */
        text-decoration: none;
        /* Quitar el subrayado */
    }

    /* Cambiar el color cuando el enlace está en estado de foco (haciendo clic) */
    a.enlaceNegro:focus {
        color: #000;
        /* Cambiar a tu color deseado, por ejemplo, negro (#000) */
    }

    table img {
        width: 100px;
        height: auto;
    }


    .sbx-medium {
        display: inline-block;
        position: relative;
        width: 200px;
        height: 37px;
        white-space: nowrap;
        box-sizing: border-box;
        font-size: 13px;
    }

    .sbx-medium__wrapper {
        width: 100%;
        height: 100%;
    }

    .sbx-medium__input {
        display: inline-block;
        -webkit-transition: box-shadow .4s ease, background .4s ease;
        transition: box-shadow .4s ease, background .4s ease;
        border: 0;
        border-radius: 7px;
        box-shadow: inset 0 0 0 1px #D9D9D9;
        background: #FFFFFF;
        padding: 0;
        padding-right: 30px;
        padding-left: 37px;
        width: 100%;
        height: 100%;
        vertical-align: middle;
        white-space: normal;
        font-size: inherit;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .sbx-medium__input::-webkit-search-decoration,
    .sbx-medium__input::-webkit-search-cancel-button,
    .sbx-medium__input::-webkit-search-results-button,
    .sbx-medium__input::-webkit-search-results-decoration {
        display: none;
    }

    .sbx-medium__input:hover {
        box-shadow: inset 0 0 0 1px silver;
    }

    .sbx-medium__input:focus,
    .sbx-medium__input:active {
        outline: 0;
        box-shadow: inset 0 0 0 1px #AAAAAA;
        background: #FFFFFF;
    }

    .sbx-medium__input::-webkit-input-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input::-moz-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input:-ms-input-placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__input::placeholder {
        color: #AAAAAA;
    }

    .sbx-medium__submit {
        position: absolute;
        top: 0;
        right: inherit;
        left: 0;
        margin: 0;
        border: 0;
        border-radius: 18px 0 0 18px;
        background-color: rgba(255, 255, 255, 0);
        padding: 0;
        width: 37px;
        height: 100%;
        vertical-align: middle;
        text-align: center;
        font-size: inherit;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .sbx-medium__submit::before {
        display: inline-block;
        margin-right: -4px;
        height: 100%;
        vertical-align: middle;
        content: '';
    }

    .sbx-medium__submit:hover,
    .sbx-medium__submit:active {
        cursor: pointer;
    }

    .sbx-medium__submit:focus {
        outline: 0;
    }

    .sbx-medium__submit svg {
        width: 17px;
        height: 17px;
        vertical-align: middle;
        fill: #666666;
    }

    .sbx-medium__reset {
        display: none;
        position: absolute;
        top: 8px;
        right: 8px;
        margin: 0;
        border: 0;
        background: none;
        cursor: pointer;
        padding: 0;
        font-size: inherit;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        fill: rgba(0, 0, 0, 0.5);
    }

    .sbx-medium__reset:focus {
        outline: 0;
    }

    .sbx-medium__reset svg {
        display: block;
        margin: 4px;
        width: 13px;
        height: 13px;
    }

    .sbx-medium__input:valid~.sbx-medium__reset {
        display: block;
        -webkit-animation-name: sbx-reset-in;
        animation-name: sbx-reset-in;
        -webkit-animation-duration: .15s;
        animation-duration: .15s;
    }

    @-webkit-keyframes sbx-reset-in {
        0% {
            -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
            opacity: 0;
        }

        100% {
            -webkit-transform: none;
            transform: none;
            opacity: 1;
        }
    }

    @keyframes sbx-reset-in {
        0% {
            -webkit-transform: translate3d(-20%, 0, 0);
            transform: translate3d(-20%, 0, 0);
            opacity: 0;
        }

        100% {
            -webkit-transform: none;
            transform: none;
            opacity: 1;
        }
    }

</style>
@endsection

@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                
                    <div class="text-right">
                        <a href="{{ route('categorias.create') }}"><button type="button" class="btn btn-primary">Crear nueva
                                categoria</button></a>
                    </div>
                

<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>imagen</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            @if (count($categories)<=0) <tr>
                <td colspan="4">No hay registros disponibles.</td>
                </tr>
                @else
                @foreach ($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td><img src="{{ asset('img/categories/'.$category->img) }}"></td>
                    <td style="display: flex; flex-direction:row; justify-content:start; gap: 0.5rem;">
                        <form action="{{ route('categorias.edit', $category->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                        </form>
                        <form action="{{ route('categorias.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>

                    </td>

                </tr>
                @endforeach
                @endif
        </tbody>

    </table>
    {{ $categories->links() }}
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>


@endsection
