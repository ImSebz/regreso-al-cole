<!-- filepath: /c:/laragon/www/regreso-al-cole/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
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
                    <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
                    <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
                    <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
                    <img src="{{ asset('assets/kilometrico-logo.png') }}" alt="Kilometrico Logo">
                </div>
            </div>

            <div class="welcome-info-container">
                <div class="welcome-info-text">
                    <h1 class="welcome-title">¿Cómo participar?</h1>
                    <div class="welcome-info">
                        <div class="info-item">
                            <img src="{{ asset('assets/registro-compra1.png') }}" alt="Registro 1">
                            <p class="text-info-content"><span class="bold-text">$30.000</span> o más en productos de
                                nuestras marcas, que incluya 1 caja de colores <span class="bold-text">Paper
                                    Mate®</span> y/o <span class="bold-text">Prismacolor®</span></p>
                        </div>
                        <div class="info-item">
                            {{-- Envio a pagina de registro --}}
                            <img src="{{ asset('assets/registro-registrate1.png') }}" id="registro_id"
                                alt="Registro 2">
                            <p class="text-info-content" id="text_info_second">Pinta el dibujo que quieras y tómale una foto al dibujo, a la
                                factura y a los productos comprados y súbelas.</p>
                        </div>
                        <div class="info-item">  
                            <img src="{{ asset('assets/registro-participa1.png') }}" alt="Registro 3">
                            <p class="text-info-content">Sé uno de los primeros <span class="bold-text">150 en
                                    participar</span> por semana y prepárate para ganar</p>
                        </div>

                        <div class="info-item-mobile">
                            <div class="info-item-mobile-text">
                                <img src="{{ asset('assets/registro-compra1.png') }}" alt="Registro 1">
                                <p class="text-info-content-mobile"><span class="bold-text">$30.000</span> o más en
                                    productos de
                                    nuestras marcas, que incluya 1 caja de colores <span class="bold-text">Paper
                                        Mate®</span> y/o <span class="bold-text">Prismacolor®</span></p>
                            </div>
                            <div class="info-item-mobile-img">
                                {{-- TODO: Cambiar imagen --}}
                                <img src="{{ asset('assets/bonos-info.png') }}" alt="">
                            </div>
                        </div>
                        <div class="info-item-mobile" id="text_info_second_mobile">
                            <div class="info-item-mobile-text">
                                <img src="{{ asset('assets/registro-registrate1.png') }}" id="registro_id"
                                    alt="Registro 2">
                                <p class="text-info-content-mobile">Pinta el dibujo que quieras y tómale una foto al
                                    dibujo, a la
                                    factura y a los productos comprados y súbelas.</p>
                            </div>
                            <div class="info-item-mobile-img">
                            </div>
                        </div>
                        <div class="info-item-mobile">
                            <div class="info-item-mobile-text">
                                <img src="{{ asset('assets/registro-participa1.png') }}" alt="Registro 3">
                                <p class="text-info-content-mobile">Sé uno de los primeros <span class="bold-text">150
                                        en
                                        participar</span> por semana y prepárate para ganar</p>
                            </div>
                            <div class="info-item-mobile-img">
                                <img src="{{ asset('assets/bonos-info.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="welcome-btn-container">
                        <div class="btn-with-image">
                            <a class="welcome-btn" id="entrar_btn" href="{{ route('login') }}">Entrar</a>
                            <img src="{{ asset('assets/select-img.png') }}" alt="Select Image" class="select-img">
                        </div>
                        <a class="welcome-btn" id="registrar_btn" href="{{ route('register') }}">Registrarme</a>
                    </div>
                </div>
                <div class="welcome-premios-img">
                    <img src="{{ asset('assets/premios-home-dekstop-v1.png') }}" alt="">
                </div>
            </div>
            <div class="welcome-legales">
                <p>Actividad - “Promo Regreso al Cole”. Ganan los primeros 150 consumidores semanales que cumplan con la
                    compra, se registren y suban correctamente la foto de su factura, de los productos comprados y su
                    dibujo hecho a mano a www.promoregresoalcole.com. Premios disponibles por semana: 20 bonos Totto por
                    valor de COP $150.000, 50 recargas Nequi por valor de COP $50.000 y 80 recargas Nequi por valor de
                    COP $25.000. Sólo se podrá ganar 1 vez por factura durante la actividad. Vigencia del 7 de enero al
                    28 de febrero de 2025 y/o hasta agotar existencias, lo que suceda primero. Aplican términos y
                    condiciones. Consúltalos en: www.promoregresoalcole.com. Organizador: Bull Marketing S.A.S. [“Nequi
                    (de Bancolombia S.A.) y Totto (Nalsani SAS) no son organizadores de la campaña y sólo son
                    responsables de sus productos”]</p>
            </div>
        </div>
    </div>
</body>
<script>
    const registroImg = document.getElementById('registro_id');

    registroImg.addEventListener('click', () => {
        window.location.href = "{{ route('register') }}";
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

</html>
