<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta_opcion_multiple extends Model
{
    use HasFactory;

    protected $table = 'pregunta_opcion_multiple';

    protected $fillable = [
        'pregunta_opcion_multiple',
        'estado_opcion_multiple'
    ];
}
