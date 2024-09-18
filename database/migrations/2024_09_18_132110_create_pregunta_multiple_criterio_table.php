<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaMultipleCriterioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_multiple_criterio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_criterio_evaluacion')->constrained('criterio_evaluacion')->onDelete('cascade');
            $table->foreignId('id_pregunta_opcion_multiple')->constrained('pregunta_opcion_multiple')->onDelete('cascade');
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
        Schema::dropIfExists('pregunta_multiple_criterio');
    }
}
