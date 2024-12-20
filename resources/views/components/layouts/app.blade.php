<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <title>Regreso al cole</title>
</head>
<body>
    @auth
    <header class="main-header">
        <nav>
            <a href="{{ route('registro-compra') }}">Registro Compra</a>
            <a href="{{ route('ganadores') }}">Ganadores</a>
            <a href="{{ route('galeria') }}">Galería</a>
            <span>{{ Auth::user()->name }}</span>
        </nav>
    </header>
    @endauth

    <main>
        {{ $slot }}
    </main>
</body>
</html>