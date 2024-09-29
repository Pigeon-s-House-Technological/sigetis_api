<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResOpMultipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_op_multiple', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_opcion_pregunta_multiple')->constrained('opcion_preg_mult')->onDelete('cascade');
            $table->boolean('estado_respuesta_opcion_multiple');
            $table->foreignId('id_grupo_evaluacion')->constrained('grupo_evaluacion')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_op_multiple');
    }
}
