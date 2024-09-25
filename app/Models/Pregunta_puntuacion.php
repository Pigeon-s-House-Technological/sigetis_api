<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Criterio_evaluacion;

class Pregunta_puntuacion extends Model
{
    use HasFactory;

    protected $table = 'pregunta_puntuacion';

    protected $fillable = [
        'id_criterio_evaluacion',
        'puntuacion',
        'respuesta_puntuacion'
    ];

    /**
     * Define la relación con el modelo Evaluacion.
     */
    public function criterio_evaluacion()
    {
        return $this->belongsTo(Criterio_evaluacion::class, 'id_criterior_evaluacion');
    }
}
