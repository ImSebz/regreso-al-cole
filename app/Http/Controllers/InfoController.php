<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RegistroFactura;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getUser($documento){
        $user = User::where('cedula', $documento)->first();
        return response()->json($user->only(['name', 'email', 'cedula']));
    }

    public function getUltimaFactura($user_id){
        $registro_factura = RegistroFactura::where('user_id', $user_id)->first();

        if ($registro_factura){
            return response()->json($registro_factura->only(['estado_id', 'observaciones']));
        }else {
            return response()->json(['message' => 'No se encontraron facturas para el usuario'], 404);
        }
    }
} 
 