@extends('layout.adminlte-layout')

@section('titulo')
Categorias
@endsection

@section('estilos')
<style>
    table td img {
        width: 100px;
    }

</style>
@endsection

@section('contenido')

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
                    <td><img src="{{asset('img/categories')}}/{{$category->img}}"></td>
                    <td>
                        <form action="{{ route('categorias.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                        <form action="{{ route('categorias.edit', $category->id) }}" method="GET">
                            @csrf
                            <button type="submit">Editar</button>
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
