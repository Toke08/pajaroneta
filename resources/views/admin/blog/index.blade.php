@extends('layout.adminlte-layout')
@section('titulo')
PajaroBlog
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

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

@endsection
