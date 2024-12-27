<div class="register-container">
    <div class="register-box">
        <form wire:submit.prevent="register">
            <input type="text" wire:model="name" placeholder="Name">
            @error('name')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="text" wire:model="cedula" placeholder="Cedula">
            @error('cedula')
                <span>{{ $message }}</span>
            @enderror
    
            <div class="input-cont">
                <label for="departamento">Departamento: </label>
                <select id="departamento" wire:model.live="departamento" class="select-departamento">
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
                <label for="ciudad">Ciudad: </label>
                <select id="ciudad" wire:model.change="ciudad" class="select-ciudad">
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
            <input type="email" wire:model="email" placeholder="Email">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="text" wire:model="celular" placeholder="Celular">
            @error('celular')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="password" wire:model="password" placeholder="Password">
            @error('password')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="password" wire:model="password_confirmation" placeholder="Confirm Password">
    
            <input type="date" wire:model="fecha_nacimiento" placeholder="Fecha de Nacimiento">
            @error('fecha_nacimiento')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="checkbox" wire:model="aceptar_tyc"> Aceptar Términos y Condiciones
            @error('aceptar_tyc')
                <span>{{ $message }}</span>
            @enderror
    
            <input type="checkbox" wire:model="aceptar_tratamiento_datos"> Aceptar Tratamiento de Datos
            @error('aceptar_tratamiento_datos')
                <span>{{ $message }}</span>
            @enderror
    
            <button type="submit">Register</button>
        </form>
    </div>
    
</div>
