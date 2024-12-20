<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\RegistroFactura;

class Ganadores extends Component
{
    public $ganadores;

    public function render()
    {
        return view('livewire.dashboard.ganadores');
    }

    public function mount(){
        $this->getGanadores();
    }

    public function getGanadores(){
    /*
        0. ['2000-08-05', '2000-08-05']
        1. ['2024-12-21', '2024-12-28']
        2. ['2024-12-29', '2025-01-05']
        3. ['2025-01-06', '2025-01-12']
        4. ['2025-01-13', '2025-01-19']
    */
    $this->ganadores = RegistroFactura::select('id', 'user_id', 'created_at')
        ->where('estado_id', 1)
        ->whereBetween('created_at', ['2000-08-05', '2000-08-05'])
        ->orderBy('created_at', 'asc')
        ->get();
    }
}
