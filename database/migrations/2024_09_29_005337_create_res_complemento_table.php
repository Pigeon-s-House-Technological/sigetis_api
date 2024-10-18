<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResComplementoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_complemento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pregunta_complemento')->constrained('pregunta_complemento')->onDelete('cascade');
            $table->string('respuesta_complemento');
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
        Schema::dropIfExists('res_complemento');
    }
}
