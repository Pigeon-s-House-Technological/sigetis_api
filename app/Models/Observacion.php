<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;

    protected $table = 'observacion';

    protected $fillable = [
        'id_resultado',
        'observacion',
    ];

    public function resultado(){
        return $this->belongsTo(Elemento::class, 'id_resultado');
    }
}
