<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaComplementoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_complemento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_criterio_evaluacion')->constrained('criterio_evaluacion')->onDelete('cascade');
            $table->string('respuesta_complemento')->nullable();
            $table->string('pregunta_complemento');
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
        Schema::dropIfExists('pregunta_complemento');
    }
}
