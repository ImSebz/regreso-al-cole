<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\RegistroFactura;

class Galeria extends Component
{
    public $fotosPortada;

    public function mount()
    {
        $this->fotosPortada = RegistroFactura::where('estado_portada', 1)
            ->orderBy('created_at', 'asc')
            ->pluck('foto_portada');
    }

    public function render()
    {
        return view('livewire.dashboard.galeria', [
            'fotosPortada' => $this->fotosPortada,
        ]);
    }
}