<?php

namespace App\Livewire\Backoffice;

use Livewire\Component;
use App\Models\RegistroFactura;
use Livewire\WithPagination;

class HistorialFactura extends Component
{
    use WithPagination;
    // Models
    public $RegistroFactura, $num_factura, $aprobacion_portada, $observaciones, $cedula_search, $factura_search;

    public function render()
    {
        $RegistroFacturaComplete = RegistroFactura::paginate(10);

        return view('livewire.backoffice.historial-factura', [
            'RegistrosFactura' => $RegistroFacturaComplete
        ]);
    }
}