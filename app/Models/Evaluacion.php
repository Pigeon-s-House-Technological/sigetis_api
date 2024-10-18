<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grupo;
use App\Models\Usuario;
use App\Models\AsignacionEvaluacion;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluacion';

    protected $fillable = [
        'nombre_evaluacion',
        'tipo_evaluacion',
        'tipo_destinatario'
    ];

    public function asignacionEvaluacion()
    {
        return $this->hasMany(AsignacionEvaluacion::class, 'id_evaluacion');
    }
}
