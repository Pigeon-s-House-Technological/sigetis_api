<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $table = 'evaluacion';

    protected $fillable = [
        'nombre_evaluacion',
        'tipo_evaluacion',
        'estado_evaluacion',
        'tipo_destinatario'
    ];

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_evaluacion', 'id_evaluacion', 'id_grupo');
    }
}
