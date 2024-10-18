<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReorderColumnsInGrupoTable extends Migration
{
    public function up()
    {
        Schema::table('grupo', function (Blueprint $table) {
            $table->integer('cantidad_integ')->default(0)->after('descripcion_grupo'); // Reubicar columna
        });
    }
}
