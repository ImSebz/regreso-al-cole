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
            session()->flash('error', 'Invalid credentials');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('components.layouts.app');
    }
}