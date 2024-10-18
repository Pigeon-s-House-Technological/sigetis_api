<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pregunta_puntuacion;
use App\Models\AsignacionEvaluacion;

class Respuesta_puntuacion extends Model
{
    use HasFactory;

    protected $table = 'res_puntuacion';

    protected $fillable = [
        'id_pregunta_puntuacion',
        'respuesta_puntuacion',
        'id_grupo_evaluacion'
    ];

    public function pregunta_puntuacion(){
        return $this->belongsTo(Pregunta_puntuacion::class, 'id_pregunta_puntuacion');
    }

    public function grupo_evaluacion(){
        return $this->belongsTo(AsignacionEvaluacion::class, 'id_grupo_evaluacion');
    }
}
