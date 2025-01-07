<div class="register-container">
    <div class="register-box">
        <div class="info-register-container">
            <div class="register-img-container">
                <img src="{{ asset('assets/registrarme-img.png') }}" alt="">
            </div>
            <div class="register-info-text">
                <h2>Ten en cuenta:</h2>
                <p>Para poder registrarte y participar debes ser mayor de 18 años.</p>
            </div>
            <div class="register-text-logo">
                <img src="{{ asset('assets/colores-logo.png') }}" alt="Colores logos">
            </div>
            <div class="register-bot-logo">
                <img src="{{ asset('assets/sharpie-logo.png') }}" alt="Sharpie Logo">
                <img src="{{ asset('assets/papermate-logo.png') }}" alt="Papermate Logo">
                <img src="{{ asset('assets/prismacolor-logo.png') }}" alt="Prismacolor Logo">
                <img src="{{ asset('assets/kilometrico-logo1.png') }}" alt="Kilometrico Logo">
            </div>
        </div>
        <div class="register-inputs-container">
            <form wire:submit.prevent="register">
                <label for="name" class="registro-label">Nombre</label>
                <input type="text" wire:model="name" id="name" placeholder="Nombre Completo"
                    class="registro-input">
                @error('name')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror
                <label for="cedula" class="registro-label">Cedula</label>
                <input type="text" id="cedula" wire:model="cedula" placeholder="Número de Cedula"
                    class="registro-input">
                @error('cedula')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror

                <div class="input-group">
                    <div class="input-cont">
                        <label for="departamento" class="registro-label">Departamento: </label>
                        <select id="departamento" wire:model.live="departamento" class="registro-input">
                            <option value="">Seleccionar</option>
                            @foreach ($departamentos as $depto)
                                <option value="{{ $depto->id }}">{{ $depto->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('departamento')
                            <div class="text-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-cont">
                        <label for="ciudad" class="registro-label">Ciudad: </label>
                        <select id="ciudad" wire:model.change="ciudad" class="registro-input">
                            <option value=""></option>
                            @if ($departamento)
                                @foreach ($departamentos->where('id', $departamento)->first()->ciudades as $ciudad)
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->descripcion }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('ciudad')
                            <div class="text-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <label for="email" class="registro-label">Correo</label>
                <input type="email" id="email" wire:model="email" placeholder="ejemplo@hotmail.com"
                    class="registro-input">
                @error('email')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror
                <label for="celular" class="registro-label">Celular</label>
                <input type="text" id="celular" wire:model="celular" placeholder="3000000000"
                    class="registro-input">
                @error('celular')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror

                <label for="fecha_nacimiento" class="registro-label">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" wire:model="fecha_nacimiento"
                    placeholder="Fecha de Nacimiento" class="registro-input">
                @error('fecha_nacimiento')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror

                <label for="password" class="registro-label">Contraseña</label>
                <div class="password-container">
                    <input type="password" id="password" wire:model="password" placeholder="Contraseña"
                        class="registro-input">
                    <i class="fas fa-eye-slash toggle-password" id="togglePassword"></i>
                </div>
                @error('password')
                    <div class="text-invalid">{{ $message }}</div>
                @enderror

                <label for="password_confirmation" class="registro-label">Confirmar Contraseña</label>
                <div class="password-container">
                    <input type="password" id="password_confirmation" wire:model="password_confirmation"
                        placeholder="Confirma Contraseña" class="registro-input">
                    <i class="fas fa-eye-slash toggle-password" id="togglePasswordConfirmation"></i>
                </div>

                <div class="checks-container">
                    <div class="check-item">
                        <input type="checkbox" id="aceptar_tyc" wire:model="aceptar_tyc">
                        <label for="aceptar_tyc" class="registro-label-check">Aceptar <a
                                href="{{ asset('assets/tyc-promocion-regreso-al-cole.pdf') }}" target="_blank"
                                rel="noopener noreferrer">T&C</a></label>
                    </div>
                    @error('aceptar_tyc')
                        <div class="text-invalid">{{ $message }}</div>
                    @enderror

                    <div class="check-item">
                        <input type="checkbox" id="aceptar_tratamiento_datos" wire:model="aceptar_tratamiento_datos">
                        <label for="aceptar_tratamiento_datos" class="registro-label-check">Autorizo el tratamiento de
                            mis
                            datos personales de conformidad con la siguiente <a
                                href="https://privacy.newellbrands.com/index?language_id=4963328" target="_blank"
                                rel="noopener noreferrer">Autorización*</a></label>
                    </div>
                    @error('aceptar_tratamiento_datos')
                        <div class="text-invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="register-btn">
                    <button type="submit" class="register-btn-enviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
            const passwordConfirmation = document.getElementById('password_confirmation');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            togglePasswordConfirmation.addEventListener('click', function() {
                const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirmation.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });

        // Validación de fecha de nacimiento mayor de 18 años
        window.onload = () => {
            const fechaNacimiento = document.getElementById('fecha_nacimiento');
            if (fechaNacimiento) {
                let today = new Date();
                let pastYear = today.getFullYear() - 18;
                today.setFullYear(pastYear);
                fechaNacimiento.max = today.toISOString().split("T")[0];
            }

        }

        const fechaNacimiento = document.getElementById('fecha_nacimiento');
        if (fechaNacimiento) {
            fechaNacimiento.addEventListener('click', () => {
                let today = new Date();
                let pastYear = today.getFullYear() - 18;
                today.setFullYear(pastYear);
                fechaNacimiento.max = today.toISOString().split("T")[0];
            });
        }


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
</div>
