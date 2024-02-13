@extends('layout.adminlte-layout')
@section('titulo')
Tags
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
</style>
@endsection

@section('contenido')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">

                

                
                    <div class="text-right">
                        <a href="{{ route('blog.create') }}"><button type="button" class="btn btn-primary">Crear nueva categoría
                                </button></a>
                    </div>
                

            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <th>{{ $tag->id }}</th>
                                            <td>{{ $tag->name }}</td>

                                            <td>
                                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
