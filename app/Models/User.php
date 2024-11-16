<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'tipo_usuario',
        'usuario',
        'password',
    ];


    protected $hidden = [
        
    ];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'usuario_grupo', 'id_usuario', 'id_grupo');
    }

    public function asignacionEvaluacion()
    {
        return $this->hasMany(AsignacionEvaluacion::class, 'id_usuario');
    }
}