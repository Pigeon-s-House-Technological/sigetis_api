<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaPuntuacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_puntuacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_criterio_evaluacion')->constrained('criterio_evaluacion')->onDelete('cascade');
            $table->integer('puntuacion');
            $table->string('pregunta_puntuacion');
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
        Schema::dropIfExists('pregunta_puntuacion');
    }
}
