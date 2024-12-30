<div class="login-container">
    <div class="login-box">
        <div class="login-inputs-container">
            <form wire:submit.prevent="login" class="login-form">
                <div class="login-email">
                    <label for="email">Correo</label>
                    <input type="email" id="email" wire:model="email" class="login-input" placeholder="Ingresa tu correo">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="login-password">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" wire:model="password" class="login-input" placeholder="Ingresa tu contraseña">
                    @error('password')
                        <span>{{ $message }}</span>
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
                    <button type="submit" class="login-btn">Iniciar sesion</button>
                </div>
            </form>

            @if (session()->has('error'))
                <span>{{ session('error') }}</span>
            @endif
        </div>
        <div class="bot-logo-login">
            <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
            <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
            <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
            <img src="{{ asset('assets/kilometrico-logo.png') }}" alt="Kilometrico Logo">
        </div>
    </div>
</div>