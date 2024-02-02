<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('estilos')
</head>
<body>
    <div class="admin-container">
        <div class="admin-sidebar">
            <!-- Aquí puedes incluir contenido para la barra lateral del panel de administración -->
            <ul>
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Comidas</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Calendiario</a></li>
            </ul>
        </div>
        <div class="admin-content">
            <div class="admin-header">
                <!-- Aquí puedes incluir contenido para la cabecera del panel de administración -->
                <h2>Panel de Administración</h2>
            </div>
            <div class="admin-main-content">
                @yield('contenido')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    @yield('scripts')
</body>
</html>
