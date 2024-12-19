<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Favicon desde ruta public/assets --}}
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <title>Regreso al Cole</title>
</head>
<body>
    <h1>Bienvenido a Promo regreso al cole</h1>
    <p>Regístrate para acceder a todos los beneficios</p>
    <a href="{{ route('register') }}">Regístrate</a>
    <a href="{{ route('login') }}">Iniciar Sesión</a>
</body>
</html>