<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/galeria.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/ganadores.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/registro-compra.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Regreso al cole</title>


</head>
{{-- TODO: PopUP - Menu mobile - galeria - ganadores - foto chatbot  --}}

<body>
    @auth
        <header class="main-header">
            <div class="header-logo">
                <div class="main-logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/expresa-tus-colores-logo.png') }}" alt="Logo Expresa tus colores">
                    </a>
                </div>
                <div class="header-sub-logos">
                    <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
                    <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
                    <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
                    <img src="{{ asset('assets/kilometrico-logo.png') }}" alt="Kilometrico Logo">

                </div>
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

    <div id="floatingMenu" class="floating-menu">
        <button id="closeMenu" class="close-menu">X</button>

        <div class="floating-menu-item" id="floating_mobile">
            <a href="{{ route('registro-compra') }}">Registro Compra</a>
        </div>
        <div class="floating-menu-item" id="floating_mobile">
            <a href="{{ route('ganadores') }}">Ganadores</a>
        </div>
        <div class="floating-menu-item" id="floating_mobile">
            <a href="{{ route('galeria') }}">Galería</a>
        </div>
        <div class="floating-menu-item">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                sesión</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <div class="floating-menu-image">
            <img src="{{ asset('assets/hand-floating-menu.png') }}" alt="Hand Floating Menu">
        </div>

    </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <script>
        document.getElementById('headerUser').addEventListener('click', function() {
            const menu = document.getElementById('floatingMenu');
            menu.classList.toggle('show');
        });

        document.getElementById('closeMenu').addEventListener('click', function() {
            const menu = document.getElementById('floatingMenu');
            menu.classList.remove('show');
        });

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
