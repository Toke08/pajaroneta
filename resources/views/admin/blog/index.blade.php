@extends('layout.masterpage')
@section('titulo')
@endsection

@section('estilos')
<style>
.table img{
    width: 150px;
    object-fit: cover;
}
</style>
@endsection

@section('contenido')
<body>
    <a href="{{ route('adminHome') }}">Volver al panel de administrador</a>
    <h1>PajaroBlog</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                    <th>Imagen</th>
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
                    <td>
                        <img src="{{asset('img/posts')}}/{{ $post->img }}"><img>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
@endsection
