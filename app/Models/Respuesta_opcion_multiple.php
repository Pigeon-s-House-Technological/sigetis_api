<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta_opcion_multiple extends Model
{
    use HasFactory;

    protected $table = 'res_op_multiple';

    protected $fillable = [
        'id_opcion_pregunta_multiple',
        'estado_respuesta_opcion_multiple',
        'id_grupo_evaluacion'
    ];

    public function opcion_pregunta_multiple(){
        return $this->belongsTo(Opcion_pregunta_multiple::class, 'id_opcion_pregunta_multiple');
    }

    public function grupo_evaluacion(){
        return $this->belongsTo(AsignacionEvaluacion::class, 'id_grupo_evaluacion');
    }
}
