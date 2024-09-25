<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Criterio_evaluacion;

class Pregunta_complemento extends Model
{
    use HasFactory;

    protected $table = 'pregunta_complemento';

    protected $fillable = [
        'id_criterio_evaluacion',
        'pregunta_complemento',
        'respuesta_complemento'
    ];

    /**
     * Define la relación con el modelo Evaluacion.
     */
    public function criterio_evaluacion()
    {
        return $this->belongsTo(Criterio_evaluacion::class, 'id_criterior_evaluacion');
    }
}
