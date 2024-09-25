<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criterio_evaluacion extends Model
{
    use HasFactory;

    protected $table = 'criterio_evaluacion';

    protected $fillable = [
        'id_evaluacion',
        'titulo_criterio'
    ];

    /**
     * Define la relación con el modelo Evaluacion.
     */
    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    /**
     * Define la relación con el modelo Pregunta_opcion_multiple.
     */
    public function pregunta_opcion_multiple()
    {
        return $this->belongsToMany(Pregunta_opcion_multiple::class, 'pregunta_multiple_criterio', 'id_criterio_evaluacion', 'id_pregunta_opcion_multiple');
    }
}
