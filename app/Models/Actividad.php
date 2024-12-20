<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Historia_usuario;
use App\Models\User;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividad';

    protected $fillable = [
        'id_hu',
        'nombre_actividad',
        'estado_actividad',
        'fecha_inicio',
        'fecha_fin',
        'encargado',
        'grupo',
        'creador'
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
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado');
    }
}
