<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Historia_usuario;

class Imagen_hu extends Model
{
    use HasFactory;

    protected $table = 'imagen_hu';

    protected $fillable = [
        'id_hu',
        'nombre_imagen'
    ];

    /**
     * Define la relación con el modelo Historia_usuario.
     */
    public function historiaUsuario()
    {
        return $this->belongsTo(Historia_usuario::class, 'id_hu');
    }
}
