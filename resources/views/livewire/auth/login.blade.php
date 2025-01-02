<div class="login-container">
    <div class="login-box">
        <div class="login-img-container">
            <img src="{{ asset('assets/iniciar-sesion-img.png') }}" alt="">
        </div>
        <div class="login-inputs-container">
            <form wire:submit.prevent="login" class="login-form">
                <div class="login-email">
                    <label for="email">Correo</label>
                    <input type="email" id="email" wire:model="email" class="login-input"
                        placeholder="Ingresa tu correo">
                    @error('email')
                        <span class="text-invalid-login">{{ $message }}</span>
                    @enderror
                </div>
                <div class="login-password">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" wire:model="password" class="login-input"
                        placeholder="Ingresa tu contraseña">
                    @error('password')
                        <span class="text-invalid-login">{{ $message }}</span>
                    @enderror
                </div>
                <div class="login-remember">
                    <p>¿Olvidaste tu contraseña?</p>
                    <div class="login-remember-checkbox">
                        <input type="checkbox" id="remember">
                        <label for="remember">Recuérdame</label>
                    </div>

                </div>
                <div class="login-btn-container">
                    <button type="submit" class="login-btn">Entrar</button>
                </div>
            </form>

            @if (session()->has('error'))
                <span class="text-invalid-login">{{ session('error') }}</span>
            @endif
        </div>
        <div class="bot-logo-login">
            <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
            <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
            <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
            <img src="{{ asset('assets/kilometrico-logo.png') }}" alt="Kilometrico Logo">
        </div>
        <div class="sharpie-logo-img">
            <img src="{{ asset('assets/sharpie-asset.png') }}" alt="Sharpie Logo">
        </div>
    </div>
</div>



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
