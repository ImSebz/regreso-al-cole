<?php

namespace App\Livewire\Backoffice;

use Livewire\Component;
use App\Models\RegistroFactura;
use Livewire\WithPagination;

class RegistrosFactura extends Component
{
    use WithPagination;
    // Models
    public $RegistroFactura, $num_factura, $aprobacion_portada, $observaciones, $cedula_search, $factura_search;

    public function render()
    {
        $filtro = [];

        if ($this->cedula_search){
            array_push($filtro, ['cedula', 'like', '%' . $this->cedula_search . '%']);
        }

        if ($this->factura_search){
            array_push($filtro, ['num_factura', 'like', '%' . $this->factura_search . '%']);
        }

        $RegistroFacturaComplete = RegistroFactura::whereHas('user', function($query) use ($filtro){
            $query->where($filtro);
        })->paginate(10);

        return view('livewire.backoffice.registros-factura', [
            'RegistrosFactura' => $RegistroFacturaComplete
        ]);
    }
}
