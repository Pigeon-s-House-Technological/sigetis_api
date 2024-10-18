<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pregunta_complemento;
use App\Models\AsignacionEvaluacion;

class Respuesta_complemento extends Model
{
    use HasFactory;

    protected $table = 'res_complemento';

    protected $fillable = [
        'id_pregunta_complemento',
        'respuesta_complemento',
        'id_grupo_evaluacion'
    ];

    public function pregunta_complemento(){
        return $this->belongsTo(Pregunta_complemento::class, 'id_pregunta_complemento');
    }

    public function grupo_evaluacion(){
        return $this->belongsTo(AsignacionEvaluacion::class, 'id_grupo_evaluacion');
    }
}
