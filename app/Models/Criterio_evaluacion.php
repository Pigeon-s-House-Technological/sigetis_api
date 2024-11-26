<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Evaluacion;
use App\Models\Pregunta_opcion_multiple;

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
        return $this->hasMany(Pregunta_opcion_multiple::class, 'id_criterio_evaluacion');
    }

    public function pregunta_puntuacion()
    {
        return $this->hasMany(Pregunta_puntuacion::class, 'id_criterio_evaluacion');
    }

    public function pregunta_complemento()
    {
        return $this->hasMany(Pregunta_complemento::class, 'id_criterio_evaluacion');
    }
}
