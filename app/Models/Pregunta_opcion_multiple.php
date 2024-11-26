<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Criterio_evaluacion;

class Pregunta_opcion_multiple extends Model
{
    use HasFactory;

    protected $table = 'pregunta_opcion_multiple';

    protected $fillable = [
        'pregunta_opcion_multiple',
        'tipo_opcion_multiple',
        'id_criterio_evaluacion'
    ];

    /**
     * Define la relación con el modelo Criterio_evaluacion.
     */
    public function criterio_evaluacion()
    {
        return $this->belongsTo(Criterio_evaluacion::class, 'id_criterio_evaluacion');
    }

    public function opciones()
    {
        return $this->hasMany(Opcion_pregunta_multiple::class, 'id_pregunta_multiple');
    }

}
