<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResPuntuacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_puntuacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pregunta_puntuacion')->constrained('pregunta_puntuacion')->onDelete('cascade');
            $table->integer('respuesta_puntuacion');
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
        Schema::dropIfExists('res_puntuacion');
    }
}
