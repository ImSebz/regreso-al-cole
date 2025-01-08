<x-guest-layout>
    <div class="forgot-password-container">
        <div class="forgot-password-items">
            <div class="forgot-password-title">
                <p>¿Olvidaste tu contraseña?</p>
            </div>
    
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
    
                <!-- Email Address -->
                <div class="forgot-password-inputs">
                    <x-input-label for="email" :value="__('Correo')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
    
                <div class="forgot-password-buttons">
                    <x-primary-button>
                        {{ __('Enviar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>