<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroFactura extends Model
{
    use HasFactory;

    protected $table = 'registro_factura';

    protected $fillable = [
        'num_factura',
        'foto_factura',
        'foto_portada',
        'user_id',
        'estado_id',
        'observaciones',
        'estado_portada',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function estadoPortada()
    {
        return $this->belongsTo(Estado::class, 'estado_portada');
    }
}