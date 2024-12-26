<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Regreso al Cole</title>
</head>

<body>
    <div class="welcome-container">
        <div class="welcome-items">
            <div class="welcome-logo">
                <div class="top-logo">
                    <img src="{{ asset('assets/expresa-tus-colores-logo.png') }}" alt="">
                </div>
                <div class="bot-logo">
                    <img src="{{ asset('assets/sharpie-logo.png') }}" alt="">
                    <img src="{{ asset('assets/papermate-logo.png') }}" alt="">
                    <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="">
                </div>
            </div>

            <div class="welcome-info-container">
                <div class="welcome-info-text">
                    <h1 class="welcome-title">¿Cómo participar?</h1>
                    <div class="welcome-info">
                        <p>1. Regístrate.</p>
                        <p>2. Sube la factura de compra con la foto de los productos participantes más tu dibujo.</p>
                        <p>3. Podrás ser uno de los 150 ganadores semanales.</p>
                    </div>
                    <div class="welcome-btn-container">
                        <a class="welcome-btn" id="entrar_btn" href="{{ route('login') }}">Entra</a>
                        <a class="welcome-btn" id="registrar_btn" href="{{ route('register') }}">Registrate</a>
                    </div>
                </div>
                <div class="welcome-premios-img">
                    <img src="{{ asset('assets/premios-home-dekstop.png') }}" alt="">
                </div>

            </div>
        </div>
    </div>

</body>

</html>
