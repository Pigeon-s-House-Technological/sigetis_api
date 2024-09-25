<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Usuario;
use App\Models\Evaluacion;


class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';

    protected $fillable = [
        'nombre_grupo',
        'descripcion_grupo',
        'id_tutor',
        'id_jefe_grupo'
    ];

    public function tutor()
    {
        return $this->belongsTo(Usuario::class, 'id_tutor');
    }

    public function jefeGrupo()
    {
        return $this->belongsTo(Usuario::class, 'id_jefe_grupo');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_grupo', 'id_grupo', 'id_usuario');
    }

    public function evaluaciones()
    {
        return $this->belongsToMany(Evaluacion::class, 'grupo_evaluacion', 'id_grupo', 'id_evaluacion');
    }
}
