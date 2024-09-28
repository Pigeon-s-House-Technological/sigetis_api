<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;// p tambien esto puede ser como Resultado
use Illuminate\Database\Eloquent\Model;

use App\Models\Actividad;

class Elemento extends Model
{
    use HasFactory;

    protected $table = 'elemento';

    protected $fillable = [
        'id_actividad',
        'nombre_elemento',
        'descripcion_elemento',
        'link_elemento',
        'archivo_elemento',
    ];

    public function actividad(){
        return $this->belongsTo(Actividad::class, 'id_actividad');
    }
}
