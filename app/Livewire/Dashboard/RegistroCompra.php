<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RegistroFactura;
use Illuminate\Support\Facades\Auth;

class RegistroCompra extends Component
{
    use WithFileUploads;

    // Models
    public $foto_factura, $foto_portada;

    // Useful vars
    public $user;

    public function render()
    {
        return view('livewire.dashboard.registro-compra');
    }

    public function storeCompra() {
        $user = Auth::user();

        $this->validate([
            'foto_factura' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:20000',
            'foto_portada' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:20000',
        ]);

        $registroFactura = new RegistroFactura;
        $registroFactura->foto_factura = $this->foto_factura->store('facturas', 'public');
        $registroFactura->foto_portada = $this->foto_portada->store('portadas', 'public');
        $registroFactura->user_id = $user->id;
        $registroFactura->save();

        $this->resetFields();
        return redirect()->route('registro-compra')->with([
            'title' => 'Registro exitoso.',
            'success' => 'Registro de compra exitoso.'
        ]);      
    }

    public function updatedFotoFactura(){
        $this->validate([
            'foto_factura' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:20000',
        ]);
    }

    public function updatedFotoPortada(){
        $this->validate([
            'foto_portada' => 'required|mimes:jpg,jpeg,png,bmp,tiff|max:20000',
        ]);
    }

    public function resetFields(){
        $this->reset(
            'foto_factura',
            'foto_portada',
        );
    }

    public function messages() {
        return [
            'foto_factura.required' => 'La foto de la factura es requerida.',
            'foto_factura.max' => 'Oops, exediste el tamaño límite de fotos.',
            'foto_factura.mimes' => 'Formato de foto inválido.',

            'foto_portada.required' => 'La foto de la portada es requerida.',
            'foto_portada.max' => 'Oops, exediste el tamaño límite de fotos.',
            'foto_portada.mimes' => 'Formato de foto inválido.',
        ];
    }
}