<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pregunta_opcion_multiple;

class Opcion_pregunta_multiple extends Model
{
    use HasFactory;

    protected $table = 'opcion_preg_mult';

    protected $fillable = [
        'id_pregunta_multiple',
        'opcion_pregunta',
        'correcta'
    ];

    public function pregunta_opcion_multiple(){
        return $this->belongsTo(Pregunta_opcion_multiple::class, 'id_pregunta_multiple');
    }
}
