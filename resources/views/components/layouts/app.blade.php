<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <title>Regreso al cole</title>
    @livewireStyles
</head>
<body>
    <div class="container">
        <header>
            <h1>Mi Aplicación</h1>
            <nav>
                <a href="{{ route('registro-compra') }}">Registro Compra</a>
                <a href="{{ route('galeria') }}">Galería</a>
                <a href="{{ route('ganadores') }}">Ganadores</a>
            </nav>
        </header>
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>