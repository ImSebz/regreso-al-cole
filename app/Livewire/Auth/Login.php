<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('registro-compra');
        } else {
            session()->flash('error', 'Oops! Correo o contraseña incorrectos.');
        }
    }

    public function messages()
    {
        return [
            'email.required' => 'Oops, tu correo es obligatorio.',
            'email.email' => 'Escribe un correo electrónico válido.',
            'password.required' => 'Oops, no olvides tu contraseña.',
        ];
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.app');
    }
}