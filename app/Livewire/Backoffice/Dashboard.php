<?php

namespace App\Livewire\Backoffice;

use App\Rules\num_factura;
use Livewire\Component;
use App\Models\User;
use App\Models\RegistroFactura;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    // Models
    public $RegistroFactura, $num_factura, $aprobacion_portada, $observaciones;
    public $search = '';
    public $searchTerm = '';

    public function render()
    {
        $RegistrosFactura = RegistroFactura::where('estado_id', 2)->paginate(9);
        $RegistroFacturaComplete = RegistroFactura::when($this->searchTerm, function($query) {
            $query->whereHas('user', function($q) {
                $q->where('cedula', 'like', '%' . $this->searchTerm . '%');
            });
        })->paginate(9);

        return view('livewire.backoffice.dashboard', [
            'RegistrosFactura' => $RegistrosFactura,
            'RegistroFacturaComplete' => $RegistroFacturaComplete
        ]);
    }

    public function search()
    {
        $this->searchTerm = $this->search;
    }

    public function getRegistro($registro_id)
    {
        $this->RegistroFactura = RegistroFactura::find($registro_id);
    }

    public function validacionRegistro($validacion)
    {
        if ($validacion){
            $this->validate([
                'num_factura' => ['required', 'alpha_num:ascii', new num_factura],
                'aprobacion_portada' => ['required', 'numeric'],
                'observaciones' => ['required', 'string']
            ]);

            $this->RegistroFactura->num_factura = $this->num_factura;
            $this->RegistroFactura->estado_id = 1;
            $this->RegistroFactura->estado_portada = $this->aprobacion_portada;
            $this->RegistroFactura->observaciones = $this->observaciones;
            $this->RegistroFactura->save();

            $message = 'Factura APROBADA exitosamente.';
        }else {
            $this->validate([
                'observaciones' => ['required', 'string']
            ]);

            $this->RegistroFactura->num_factura = null;
            $this->RegistroFactura->estado_id = 4;
            $this->RegistroFactura->estado_portada = 4;
            $this->RegistroFactura->observaciones = $this->observaciones;
            $this->RegistroFactura->save();

            $message = 'Factura RECHAZADA exitosamente.';
        }

        $this->reset(
            'RegistroFactura',
            'num_factura',
            'aprobacion_portada',
            'observaciones'
        );
        return redirect()->back()->with('success', $message);
    }

    // VALIDACIONES
    public function updatedNumFactura(){
        $this->validate([
            'num_factura' => ['required', 'alpha_num:ascii', new num_factura]
        ]);
    }

    public function updatedAprobacionPortada(){
        $this->validate([
            'aprobacion_portada' => ['required', 'numeric']
        ]);
    }

    public function updatedObservaciones(){
        $this->validate([
            'observaciones' => ['required', 'string']
        ]);
    }
}