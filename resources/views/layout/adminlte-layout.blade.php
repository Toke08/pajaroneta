<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <style>
    :root{
        --rojoOscuro:#730000;
        --rojoClaro:#A62224;
        --amarilloOscuro:#CA8F00;
        --amarilloClaro:#E5A200;
        --blanco:#FFFFFF;
        --gris:#F4F4F4;
        --negro:#000000;
    }

    .sombreado-blanco {

    filter: drop-shadow(0 3px 7px rgba(255, 255, 255, 0.8));

    }



    [class*=sidebar-dark] .brand-link{
        border-bottom: 1px solid #ffffff !important;
    }

    body > div > aside{
        background-color: var(--rojoOscuro) !important;
    }

    body > div > aside > div > nav > ul > li > a{
        color: vWar(--blanco) !important;
    }

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
  </style>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Estilos personalizados -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- csrf para actualizar info del usuario desde panel admin -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <!-- JS de Bootstrap (popper.js y Bootstrap JS) -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- jQuery -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center" style="background-color: var(--rojoOscuro) !important;">
        <img class="animation__shake img-fluid sombreado-blanco" src="{{ asset('img/logo/pajaro-01.png') }}" alt="AdminLTELogo" height="250" width="250">
      </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-0 d-flex">
        <div class="image">
            @if(auth()->user())
            <img src="{{ asset('img/users/' . auth()->user()->profile_img) }}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
            @if(auth()->user())
          {{auth()->user()->name}}
            @endif
        </div>
        <div class="info">
            @if(auth()->user())
            <a class="enlaceNegro" href="{{ route('logout')}}"><i class="fa-solid fa-right-from-bracket"></i></a>
            @endif
        </div>


      </ul>

    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="{{ route('home') }}" class="brand-link" style="color: var(--blanco) !important;">
      <img src="{{ asset('img/logo/pajaro-01.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 " style="opacity: 1">
      <span class="brand-text font-weight-light font-weight-normal" blanco>Pajaroneta</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('adminHome') }}" class="nav-link">
                <i class="fa-solid fa-square-poll-vertical" style="color: var(--blanco) !important;"></i>
              <p style="color: var(--blanco) !important;">
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
            <i class="fa-solid fa-user" style="color: var(--blanco) !important;"></i>
              <p style="color: var(--blanco) !important;">
                Usuarios
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('galeria-comidas.index') }}" class="nav-link">
            <i class="fa-solid fa-utensils" style="color: var(--blanco) !important;"></i>
              <p style="color: var(--blanco) !important;">
                Comidas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog.index') }}" class="nav-link">
            <i class="fa-solid fa-newspaper" style="color: var(--blanco) !important;"></i>
              <p style="color: var(--blanco) !important;">
                Blog
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('calendario.index') }}" class="nav-link">
            <i class="fa-solid fa-calendar-days" style="color: var(--blanco) !important;"></i>
              <p style="color: var(--blanco) !important;">
                Calendario
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('titulo')</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <main role="main" class="container">
        <!-- mensajes flash -->
        @if(Session::has('message'))
            <div class="alert alert-info" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <!-- errores de validador -->
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @yield('estilos')
        @yield('contenido')
        @yield('script')
    </main>

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
