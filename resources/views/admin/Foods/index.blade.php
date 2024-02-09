@extends('layout.adminlte-layout')

@section('titulo')
    Comidas
@endsection

@section('estilos')
<style>
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
                      <th>id</th>
                      <th>nombre</th>
                      <th>precio</th>
                      <th>imagen</th>
                      <th>descripcion</th>
                      <th>categoria</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
  <tbody>


        @foreach ($foods as $food)
        <tr>
            <th scope="row">{{$food->id}}</th>
            <td><a href="{{ route('galeria-comidas.show', ['id' => $food->id]) }}">{{$food->name}}</a></td>
            <td>{{$food->price}}</td>
            <td><img src="{{ asset('img/foods/'.$food->img) }}"></td>
            <td>{{$food->description}}</td>
            <td>{{$food->category->name}}</td>
            <td>
                <form action="{{ route('galeria-comidas.edit', $food->id) }}" method="GET">
                    @csrf
                    <button type="submit">Editar</button>
                </form>

                <form action="{{ route('galeria-comidas.destroy', $food->id) }}"   method="POST">
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
