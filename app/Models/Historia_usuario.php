<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Sprint;

class Historia_usuario extends Model
{
    use HasFactory;

    protected $table = 'historia_usuario';

    protected $fillable = [
        'id_sprint',
        'identificador_hu',
        'prerrequisitos',
        'descripcion_hu',
        'prioridad',
        'tiempo_estimado',
        'titulo_hu',
        'criterios_aceptacion'
    ];

    /**
     * Define la relación con el modelo Sprint.
     */
    public function sprint()
    {
        return $this->belongsTo(Sprint::class, 'id_sprint');
    }
}
