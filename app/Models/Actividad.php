<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividad';

    protected $fillable = [
        'id_hu',
        'id_usuario',
        'nombre_actividad',
        'estado_actividad',
    ];

    /**
     * Define la relación con el modelo Historia_usuario.
     */

    public function historia_usuario()
    {
        return $this->belongsTo(Historia_usuario::class, 'id_hu');
    }

    /**
     * Define la relación con el modelo Usuario.
     */

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
