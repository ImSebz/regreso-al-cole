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
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent/3.1.1/cookieconsent.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent/3.1.1/cookieconsent.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K87TS7QZ');
    </script>
    <!-- End Google Tag Manager -->
    <title>Regreso al cole</title>


</head>
{{-- TODO: PopUP - Menu mobile - galeria - ganadores - foto chatbot  --}}

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K87TS7QZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
                    <img src="{{ asset('assets/kilometrico-logo1.png') }}" alt="Kilometrico Logo">

                </div>
            </div>
            <div class="header-menu">
                {{-- <a href="{{ route('registro-compra') }}"
                    class="{{ request()->routeIs('registro-compra') ? 'active' : '' }}">Registro Compra</a> --}}
                <a href="{{ route('ganadores') }}"
                    class="{{ request()->routeIs('ganadores') ? 'active' : '' }}">Ganadores</a>
                <a href="{{ route('galeria') }}" class="{{ request()->routeIs('galeria') ? 'active' : '' }}">Galería</a>
                <div class="header-user" id="headerUser">
                    <p>
                        {{ Auth::user()->name }}
                    </p>
                    <img src="{{ asset('assets/arrow-down.png') }}" alt="Arrow Down" class="arrow-down">
                </div>
            </div>
        </header>


    @endauth

    <div id="floatingMenu" class="floating-menu">
        <button id="closeMenu" class="close-menu">X</button>

        {{-- <div class="floating-menu-item" id="floating_mobile">
            <a href="{{ route('registro-compra') }}">Registro Compra</a>
        </div> --}}
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
        window.addEventListener("load", function() {
            window.cookieconsent.initialise({
                palette: {
                    popup: {
                        background: "#333333",
                        text: "#ffffff"
                    },
                    button: {
                        background: "#28a745",
                        text: "#ffffff"
                    }
                },
                theme: "classic",
                position: "bottom",
                content: {
                    message: "Consulta términos y condiciones aplicables a la promoción: <a class='cookie-consent-link' href='https://promoregresoalcole.com/assets/tyc-promoregresoalcole.pdf' target='_blank'>Términos y condiciones</a>. Este sitio web utiliza tecnologías como cookies para habilitar la funcionalidad esencial del sitio, así como para analítica, personalización y publicidad dirigida. Para obtener más información, consulte el siguiente enlace",
                    dismiss: "Aceptar",
                    link: "Política de cookies",
                    href: "https://privacy.newellbrands.com/cookie-policy/index",
                }
            });
        });


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
