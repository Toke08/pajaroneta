@extends('adminlte::page')
@section('titulo')
@endsection

@section('css')
<style>
.table img{
    width: 150px;
    object-fit: cover;
}
</style>
@endsection

@section('content')
<body>
    <a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
    <h1>PajaroBlog</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Imagen</th>
                    <th>Fecha publicacion</th>
                    <th>ultima modificacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="blog/{{ $post->id }}">{{ $post->title }}</a></td>
                    <td>{{ $post->status }}
                        {{-- <form action="{{ route('blog.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" onchange="this.form.submit()">
                                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Borrador</option>
                                <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Publicado</option>
                            </select>
                        </form> --}}
                    </td>
                    <td>
                        <img src="{{asset('img/posts')}}/{{ $post->img }}"><img>
                    </td>
                    <td>
                        {{$post->created_at}}
                    </td>
                    <td>
                        {{$post->updated_at}}
                    </td>
                    <td>
                        <form action="{{ route('blog.edit', $post->id) }}" method="GET">
                            @csrf
                            <button type="submit">Editar</button>
                        </form>

                        <form action="{{ route('blog.destroy', $post->id) }}"   method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
@endsection
