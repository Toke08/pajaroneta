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
            <a href="{{ route('user.index')}}" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="{{ route('blog.index')}}" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="{{ route('galeria-comidas.index')}}" class="small-box-footer">Ver mas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <!-- small box -->
            <div class="card">
                <div class="card-body">
                    <h3>Post más buscado</h3>

                    @if($postMasBuscado)
                        <img src="{{ asset('img/posts/'.$postMasBuscado->img) }}" class="img-fluid mb-3" alt="Imagen del post">
                        <h4 class="card-text">Título: {{ \Illuminate\Support\Str::limit($postMasBuscado->title, 50) }}</h4>
                        <p class="card-text">Contenido: {{ \Illuminate\Support\Str::limit($postMasBuscado->content, 200) }}</p>
                        <p class="card-text">Número de vistas: {{ $postMasBuscado->views }}</p>
                    @else
                        <p class="card-text">No hay posts disponibles.</p>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('blog_show', ['id' => $comidaMasBuscada->id]) }}" class="btn btn-primary">Ver más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <!-- small box -->
            <div class="card">
                <div class="card-body">
                    <h3>Comida más buscada</h3>

                    @if($comidaMasBuscada)
                        <img src="{{ asset('img/foods/'.$comidaMasBuscada->img) }}" class="img-fluid mb-3" alt="Imagen del post">
                        <h4 class="card-text">Título: {{ \Illuminate\Support\Str::limit($comidaMasBuscada->name, 50) }}</h4>
                        <p class="card-text">Contenido: {{ \Illuminate\Support\Str::limit($comidaMasBuscada->description, 200) }}</p>
                        <p class="card-text">Número de vistas: {{ $comidaMasBuscada->views }}</p>
                    @else
                        <p class="card-text">No hay posts disponibles.</p>
                    @endif
                </div>

                <div class="card-footer">
                    <a href="{{ route('galeria-comidas.show', ['id' => $comidaMasBuscada->id]) }}" class="btn btn-primary">Ver más <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
</Section>


@endsection
