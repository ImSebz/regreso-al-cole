<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\RegistroFactura;

class Ganadores extends Component
{
    public $ganadores;
    public $maxItems = 150;

    public function mount(){
        $this->getGanadores();
    }

    public function getGanadores(){
        $this->ganadores = RegistroFactura::with('user') // Asegúrate de cargar la relación 'user'
            ->where('estado_id', 1)
            ->whereBetween('created_at', ['2025-02-17', '2025-02-24'])
            ->orderBy('created_at', 'asc')
            ->take($this->maxItems)
            ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.ganadores', ['ganadores' => $this->ganadores]);
    }
}

 /*
        0. ['2000-08-05', '2000-08-05']
        1. ['2024-12-21', '2024-12-28']
        2. ['2024-12-29', '2025-01-05']
        3. ['2025-01-06', '2025-01-12']
        4. ['2025-01-13', '2025-01-19']
    */