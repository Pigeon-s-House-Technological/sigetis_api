<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Usuario;
use App\Models\Evaluacion;
use App\Models\AsignacionEvaluacion;


class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';

    protected $fillable = [
        'nombre_grupo',
        'descripcion_grupo',
        'cantidad_integ',
        'id_tutor',
        'id_jefe_grupo'
    ];

    public function tutor()
    {
        return $this->belongsTo(User::class, 'id_tutor');
    }

    public function jefeGrupo()
    {
        return $this->belongsTo(User::class, 'id_jefe_grupo');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuario_grupo', 'id_grupo', 'id_usuario');
    }

    public function asignacionEvaluacion()
    {
        return $this->hasMany(asignacionEvaluacion::class, 'id_grupo');
    }
}
