<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="{{ route('registro-compra') }}">Registro Compra</a>
    <a href="{{ route('dibujos') }}">Dibujos</a>
    <a href="{{ route('ganadores') }}">Ganadores</a>
</body>
</html>