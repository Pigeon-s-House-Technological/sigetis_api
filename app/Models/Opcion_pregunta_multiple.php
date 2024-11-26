<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pregunta_opcion_multiple;

class Opcion_pregunta_multiple extends Model
{
    use HasFactory;

    protected $table = 'opcion_preg_mult';

    protected $fillable = [
        'id_pregunta_multiple',
        'opcion_pregunta',
    ];

    public function pregunta_opcion_multiple(){
        return $this->belongsTo(Pregunta_opcion_multiple::class, 'id_pregunta_multiple');
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta_opcion_multiple::class, 'id_opcion_pregunta_multiple');
    }
}
