@extends('layout.adminlte-layout')

@section('titulo')
Dashboard
@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ count($users) }}</h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <a href="{{ route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                {{-- $totalVentas = DB::table('ventas')->count();
                  echo '$ ' . number_format($totalVentas,2); --}}
              <h3>{{ count($posts) }}</h3>

              <p>Posts publicados</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <a href="{{ route('blog.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ count($foods) }}</h3>

              <p>Comidas en venta</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-utensils"></i>
            </div>
            <a href="{{ route('galeria-comidas.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
</Section>


@endsection
