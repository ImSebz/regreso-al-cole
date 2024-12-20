<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function getUser($documento){
        $user = User::where('cedula', $documento)->first();

        return response()->json($user->only(['name', 'email']));
    }
} 
