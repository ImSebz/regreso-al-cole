<div class="register-container">
    <div class="register-box">
        <div class="register-inputs-container">
            <form wire:submit.prevent="register">
                <label for="name" class="registro-label">Nombre</label>
                <input type="text" wire:model="name" id="name" placeholder="Nombre Completo" class="registro-input">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
                <label for="cedula" class="registro-label">Cedula</label>
                <input type="text" id="cedula" wire:model="cedula" placeholder="Cedula" class="registro-input">
                @error('cedula')
                    <span>{{ $message }}</span>
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
                <input type="email" id="email" wire:model="email" placeholder="Correo" class="registro-input">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
                <label for="celular" class="registro-label">Celular</label>
                <input type="text" id="celular" wire:model="celular" placeholder="Celular" class="registro-input">
                @error('celular')
                    <span>{{ $message }}</span>
                @enderror
                <label for="password" class="registro-label">Contraseña</label>
                <input type="password" id="password" wire:model="password" placeholder="Contraseña"
                    class="registro-input">
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
                <label for="password_confirmation" class="registro-label">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" wire:model="password_confirmation"
                    placeholder="Confirma Contraseña" class="registro-input">

                <label for="fecha_nacimiento" class="registro-label">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" wire:model="fecha_nacimiento"
                    placeholder="Fecha de Nacimiento" class="registro-input">
                @error('fecha_nacimiento')
                    <span>{{ $message }}</span>
                @enderror

                <input type="checkbox" wire:model="aceptar_tyc"> Aceptar <a
                    href="{{ asset('assets/tyc-promocion-regreso-al-cole.pdf') }}" target="_blank"
                    rel="noopener noreferrer">T&C</a>
                @error('aceptar_tyc')
                    <span>{{ $message }}</span>
                @enderror

                <input type="checkbox" wire:model="aceptar_tratamiento_datos">Autorizo el tratamiento de mis datos personales de conformidad con la siguiente <a
                    href="https://privacy.newellbrands.com/index?language_id=4963328" target="_blank"
                    rel="noopener noreferrer">Autorización</a>
                @error('aceptar_tratamiento_datos')
                    <span>{{ $message }}</span>
                @enderror

                <button type="submit">Enviar</button>
            </form>
        </div>

    </div>
</div>
