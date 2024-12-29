<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Ciudad;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class Register extends Component
{
    // Models 
    public $name, $email, $cedula, $celular, $ciudad,
            $fecha_nacimiento, $aceptar_tyc, $aceptar_tratamiento_datos,
            $departamento, $password, $password_confirmation;

    // Useful vars
    public $ciudades = [], $departamentos = [];

    public function render()
    {
        return view('livewire.auth.register');
    } 

    public function mount(){
        $this->getDepartamentos();
    }

    public function getDepartamentos(){
        $this->departamentos = Departamento::all();
    }

    public function updatedDepartamentoId($value)
    {
        $this->ciudades = Ciudad::where('departamento_id', $value)->get();
        dd($this->ciudades);
    }

    public function register(){
        $this->validate([
            'name' => 'required|string|max:250',
            'cedula' => 'required|numeric|max_digits:10|unique:users',
            'celular' => 'required|numeric|max_digits:10|unique:users',
            'ciudad' => 'required|numeric',
            'email' => 'required|email|max:250|unique:users',
            'fecha_nacimiento' => 'required|date',
            'aceptar_tyc' => 'required|accepted',
            'aceptar_tratamiento_datos' => 'required|accepted',
            'password' => ['required', 'same:password_confirmation', Rules\Password::defaults()]
        ]);

        $user = User::create([ 
            'name' => $this->name,
            'cedula' => $this->cedula,
            'celular' => $this->celular,
            'ciudad_id' => $this->ciudad,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'email' => $this->email,
            'aceptar_tyc' => $this->aceptar_tyc,
            'aceptar_tratamiento_datos' => $this->aceptar_tratamiento_datos,
            'password' => Hash::make($this->password),
            'rol_id' => 1, // Asignar rol por defecto
            'estado_id' => 1, // Asignar estado por defecto
        ]);        

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('registro-compra')->with([
            'title' => '¡Gracias!',
            'register-success' => 'Ya estas registrado en nuestra promoción. Continua con el registro de la factura y dibujo'
        ]);
    }

    // Validations for individual fields
    public function updatedName(){
        $this->validate(['name' => 'required|string|max:250']);
    }

    public function updatedEmail(){
        $this->validate(['email' => 'required|email|max:250|unique:users']);
    }

    public function updatedCedula(){
        $this->validate(['cedula' => 'required|numeric|max_digits:10|unique:users']);
    }

    public function updatedCelular(){
        $this->validate(['celular' => 'required|numeric|max_digits:10|unique:users']);
    }

    public function updatedCiudad(){
        $this->validate(['ciudad' => 'required|numeric']);
    } 

    public function updatedFechaNacimiento(){
        $this->validate(['fecha_nacimiento' => 'required|date|before:2006-12-31']);
    }

    public function updatedAceptarTyc(){
        $this->validate(['aceptar_tyc' => 'required|accepted']);
    }

    public function updatedAceptarTratamientoDatos(){
        $this->validate(['aceptar_tratamiento_datos' => 'required|accepted']);
    }

    public function updatedPassword(){
        $this->validate(['password' => ['required', 'same:password_confirmation', Rules\Password::defaults()]]);
    }

    public function updatedPasswordConfirmation(){
        $this->validate(['password' => ['required', 'same:password_confirmation', Rules\Password::defaults()]]);
    }

    // Custom validation messages
    public function messages() 
    {
        return [
            'name.required' => "Oops, tu nombre es obligatorio.",
            'name.string' => "Formato no valido.",
            'name.max' => "Oops, excediste el límite máximo de caracteres.",

            'email.required' => "Oops, tu correo es obligatorio.",
            'email.email' => "Escribe un correo electrónico valido.",
            'email.max' => "Oops, excediste el límite máximo de caracteres.",
            'email.unique' => "Oops, este correo ya fué registrado.",

            'cedula.required' => "Oops, tu documento es obligatorio.",
            'cedula.numeric' => "Oops, tu documento no puede tener letras.",
            'cedula.max_digits' => "Oops, excediste el límite máximo de caracteres.",
            'cedula.unique' => "Oops, este documento ya fué registrado.",

            'celular.required' => "Oops, tu teléfono es obligatorio.",
            'celular.numeric' => "Oops, tu teléfono no puede tener letras.",
            'celular.max_digits' => "Oops, excediste el límite máximo de caracteres.",
            'celular.unique' => "Oops, este teléfono ya fué registrado.",

            'ciudad.required' => "Oops, tu ciudad es obligatoria.",
            'ciudad.numeric' => "Formato no valido.",

            'fecha_nacimiento.required' => "Oops, tu fecha de nacimiento es obligatoria.",
            'fecha_nacimiento.date' => "Formato no valido.",

            'aceptar_tyc.required' => "Debes aceptar los términos y condiciones.",
            'aceptar_tyc.accepted' => "Debes aceptar los términos y condiciones.",

            'aceptar_tratamiento_datos.required' => "Debes aceptar las políticas de privacidad.",
            'aceptar_tratamiento_datos.accepted' => "Debes aceptar las políticas de privacidad.",

            'password.required' => "Oops, no olvides tu contraseña.",
            'password.same' => "Las contraseñas no coinciden.",
            'password.min' => "Oops, tu contraseña debe tener al menos 8 caracteres."
        ];
    }
}