<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Aplicación</title>
</head>
<body>
    @auth
    <header>
        <h1>Mi Aplicación</h1>
        <nav>
            <a href="{{ route('registro-compra') }}">Registro Compra</a>
            <a href="{{ route('galeria') }}">Galería</a>
            <a href="{{ route('ganadores') }}">Ganadores</a>
        </nav>
    </header>
    @endauth

    <main>
        {{ $slot }}
    </main>
</body>
</html>