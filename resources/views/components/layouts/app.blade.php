<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ganadores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro-compra.css') }}">
    <title>Regreso al cole</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @auth
        <header class="main-header">
            <div class="header-logo">
                <img src="{{ asset('assets/expresa-tus-colores-logo.png') }}" alt="Logo Expresa tus colores">

            </div>
            <div class="header-menu">
                <a href="{{ route('registro-compra') }}"
                    class="{{ request()->routeIs('registro-compra') ? 'active' : '' }}">Registro Compra</a>
                <a href="{{ route('ganadores') }}"
                    class="{{ request()->routeIs('ganadores') ? 'active' : '' }}">Ganadores</a>
                <a href="{{ route('galeria') }}" class="{{ request()->routeIs('galeria') ? 'active' : '' }}">Galería</a>
                <div class="header-user" id="headerUser">
                    {{ Auth::user()->name }}
                    <img src="{{ asset('assets/arrow-down.png') }}" alt="Arrow Down" class="arrow-down">
                </div>
            </div>
        </header>
    @endauth

    <main>
        {{ $slot }}
    </main>

    <script>
        window.addEventListener('mouseover', initLandbot, {
            once: true
        });
        window.addEventListener('touchstart', initLandbot, {
            once: true
        });
        var myLandbot;

        function initLandbot() {
            if (!myLandbot) {
                var s = document.createElement('script');
                s.type = "module"
                s.async = true;
                s.addEventListener('load', function() {
                    var myLandbot = new Landbot.Livechat({
                        configUrl: 'https://storage.googleapis.com/landbot.pro/v3/H-2725119-8US3G5QD0NJJVDYQ/index.json',
                    });
                });
                s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.mjs';
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            }
        }
    </script>
</body>

</html>
