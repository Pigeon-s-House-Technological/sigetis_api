<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Grupo;

class Sprint extends Model
{
    use HasFactory;

    protected $table = 'sprint';

    protected $fillable = [
        'id_grupo',
        'numero_sprint',
        'fecha_inicio',
        'fecha_fin'
    ];

    /**
     * Define la relación con el modelo Evaluacion.
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    
}
