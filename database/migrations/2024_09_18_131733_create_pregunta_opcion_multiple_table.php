<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaOpcionMultipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregunta_opcion_multiple', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_criterio_evaluacion')->constrained('criterio_evaluacion')->onDelete('cascade');
            $table->string('pregunta_opcion_multiple');
            $table->boolean('tipo_opcion_multiple')->default(0);//0 = unica, 1 = multiples respuestas
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
        Schema::dropIfExists('pregunta_opcion_multiple');
    }
}
