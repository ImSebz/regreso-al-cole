<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cedula',
        'ciudad',
        'email',
        'celular',
        'password',
        'fecha_nacimiento',
        'aceptar_tyc',
        'aceptar_tratamiento_datos',
        'rol_id',
        'estado_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'fecha_nacimiento' => 'date',
        'aceptar_tyc' => 'boolean',
        'aceptar_tratamiento_datos' => 'boolean',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }


    public function state()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}