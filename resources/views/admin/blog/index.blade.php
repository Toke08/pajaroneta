@extends('layout.adminlte-layout')
@section('titulo')
PajaroBlog
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

                <nav class="navbar navbar-light bg-light ">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                        <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-search-13" viewBox="0 0 40 40">
                            <path
                                d="M26.804 29.01c-2.832 2.34-6.465 3.746-10.426 3.746C7.333 32.756 0 25.424 0 16.378 0 7.333 7.333 0 16.378 0c9.046 0 16.378 7.333 16.378 16.378 0 3.96-1.406 7.594-3.746 10.426l10.534 10.534c.607.607.61 1.59-.004 2.202-.61.61-1.597.61-2.202.004L26.804 29.01zm-10.426.627c7.323 0 13.26-5.936 13.26-13.26 0-7.32-5.937-13.257-13.26-13.257C9.056 3.12 3.12 9.056 3.12 16.378c0 7.323 5.936 13.26 13.258 13.26z"
                                fill-rule="evenodd" />
                        </symbol>
                        <symbol xmlns="http://www.w3.org/2000/svg" id="sbx-icon-clear-2" viewBox="0 0 20 20">
                            <path
                                d="M8.96 10L.52 1.562 0 1.042 1.04 0l.522.52L10 8.96 18.438.52l.52-.52L20 1.04l-.52.522L11.04 10l8.44 8.438.52.52L18.96 20l-.522-.52L10 11.04l-8.438 8.44-.52.52L0 18.96l.52-.522L8.96 10z"
                                fill-rule="evenodd" />
                        </symbol>
                    </svg>

                    <form action="{{ route('blog.index')}}" method="GET" novalidate="novalidate"
                        class="searchbox sbx-medium">
                        <div role="search" class="sbx-medium__wrapper">
                            <input type="search" name="search" placeholder="Search your website" autocomplete="off"
                                required="required" class="sbx-medium__input">
                            <button type="submit" title="Submit your search query." class="sbx-medium__submit">
                                <svg role="img" aria-label="Search">
                                    <use xlink:href="#sbx-icon-search-13"></use>
                                </svg>
                            </button>
                            <button type="reset" title="Clear the search query." class="sbx-medium__reset">
                                <svg role="img" aria-label="Reset">
                                    <use xlink:href="#sbx-icon-clear-2"></use>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <script type="text/javascript">
                        document.querySelector('.searchbox [type="reset"]').addEventListener('click', function () {
                            this.parentNode.querySelector('input').focus();
                        });

                    </script>
                    <div class="text-right">
                        <a href="{{ route('blog.create') }}"><button type="button" class="btn btn-primary">Crear nuevo
                                post</button></a>
                    </div>
                </nav>




            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                <a class="enlaceNegro"
                                    href="{{ route('blog.index', ['column' => 'id', 'direction' => $direction]) }}">
                                    ID
                                    <i class="fa-solid fa-arrows-up-down"></i>
                                </a>
                            </th>
                            <th>Título</th>
                            <th>Tag</th>
                            <th>Estado</th>
                            <th>Imagen</th>
                            <th>
                                <a class="enlaceNegro" href="{{ route('blog.index', ['column' => 'created_at', 'direction' => $direction]) }}">
                                    Fecha de creación
                                    <i class="fa-solid fa-arrows-up-down"></i>
                                </a>
                            </th>
                            <th>
                                <a class="enlaceNegro" href="{{ route('blog.index', ['column' => 'updated_at', 'direction' => $direction]) }}">
                                    Ultima modificacion
                                    <i class="fa-solid fa-arrows-up-down"></i>
                                </a>
                            </th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($posts)<=0) <tr>
                            <td colspan="7">No hay registros disponibles.</td>
                            </tr>
                            @else
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="blog/{{ $post->id }}">{{ $post->title }}</a></td>
                                <td>{{ $post->tag->name }}</td>
                                <td>{{ $post->status }}
                                    {{-- <form action="{{ route('blog.update', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Borrador
                                        </option>
                                        <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>
                                            Publicado</option>
                                    </select>
                                    </form> --}}
                                </td>
                                <td>
                                    <img src="{{ asset('img/posts/'.$post->img) }}">
                                </td>
                                <td>
                                    {{ $post->created_at->format('Y-m-d') }}
                                </td>
                                <td>
                                    {{$post->updated_at->format('Y-m-d')}}
                                </td>
                                <td style="display: flex; flex-direction:row; justify-content:center; gap: 0.5rem;">
                                    <form action="{{ route('blog.edit', $post->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Editar</button>
                                    </form>

                                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
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
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
