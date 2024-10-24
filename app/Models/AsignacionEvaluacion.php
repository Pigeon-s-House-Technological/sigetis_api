<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'grupo_evaluacion';

    protected $fillable = [
        'id_evaluacion',
        'id_grupo',
        'id_usuario',
        'estado_evaluacion',
        'id_grupo_aux',
        'id_usuario_aux'
    ];

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class, 'id_evaluacion');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    public function grupoAux()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo_aux');
    }
    public function usuarioAux()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_aux');
    }


}
