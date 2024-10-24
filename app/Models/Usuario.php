<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grupo;
use App\Models\AsignacionEvaluacion;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'nombre_user',
        'apellido_user',
        'correo',
        'tipo_usuario'
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

