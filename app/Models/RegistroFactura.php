<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroFactura extends Model
{
    use HasFactory;

    protected $table = 'registro_factura';

    public function user(){
        return $this->belongsTo(User::class);
    }
}