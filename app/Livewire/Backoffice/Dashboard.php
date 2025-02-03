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

        $RegistrosFactura = RegistroFactura::where('estado_id', 2)->paginate(10);

        $RegistroFacturaComplete = RegistroFactura::whereHas('user', function($query) use ($filtro){
            $query->where($filtro);
        })->paginate(10);

        return view('livewire.backoffice.dashboard', [
            'RegistrosFactura' => $RegistrosFactura,
            'RegistroFacturaComplete' => $RegistroFacturaComplete
        ]);
    }

    public function getRegistro($registro_id)
    {
        $this->RegistroFactura = RegistroFactura::find($registro_id);
    }

    public function validacionRegistro($validacion)
    {

        $existingCount = RegistroFactura::where('user_id', $this->RegistroFactura->user_id)
                                            ->where('estado_id', 1)
                                            ->count();
    
        if ($existingCount >= 3) {
            $this->RegistroFactura->num_factura = null;
            $this->RegistroFactura->estado_id = 4;
            $this->RegistroFactura->estado_portada = 4;
            $this->RegistroFactura->observaciones = "Factura rechazada por máximo de 3 facturas registradas aprobadas.";
            $this->RegistroFactura->save();

            $message = 'Factura RECHAZADA automaticamente por exceso de limite de facturas aprobadas.';

            return;
        }

        if ($validacion) {
            $this->validate([
                'num_factura' => ['required', 'alpha_num:ascii', new num_factura],
                'aprobacion_portada' => ['required', 'numeric'],
                'observaciones' => ['required', 'string']
            ]);
        
            
        
            $this->RegistroFactura->user = User::find($this->RegistroFactura->user_id);
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
