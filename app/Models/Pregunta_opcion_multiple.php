<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta_opcion_multiple extends Model
{
    use HasFactory;

    protected $table = 'pregunta_opcion_multiple';

    protected $fillable = [
        'pregunta_opcion_multiple',
        'estado_opcion_multiple'
    ];

    public function criterios()
    {
        return $this->belongsToMany(Criterio_evaluacion::class, 'pregunta_multiple_criterio', 'id_pregunta_opcion_multiple', 'id_criterio_evaluacion');
    }
}
