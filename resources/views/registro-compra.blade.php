<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/registro-compra.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compra</title>
</head>
<body>
    <h1>Registro de Compra</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="factura">Foto de Factura:</label>
            <input type="file" id="factura" name="factura" accept="image/*" required>
        </div>
        <div>
            <label for="portada">Foto Dibujo:</label>
            <input type="file" id="portada" name="portada" accept="image/*" required>
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>