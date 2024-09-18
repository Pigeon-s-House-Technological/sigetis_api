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
}
