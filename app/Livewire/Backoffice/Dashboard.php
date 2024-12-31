<?php

namespace App\Livewire\Backoffice;

use Livewire\Component;
use App\Models\User;
use App\Models\RegistroFactura;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $RegistrosFactura = RegistroFactura::where('estado_id', 2)->paginate(5);
        return view('livewire.backoffice.dashboard', ['RegistrosFactura' => $RegistrosFactura]);
    }

}
