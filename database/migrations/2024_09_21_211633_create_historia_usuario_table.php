<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriaUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_usuario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sprint')->constrained('sprint')->onDetelete('cascade');
            $table->string('identificador_hu');
            $table->string('prerrequisitos');
            $table->string('descripcion_hu');
            $table->integer('prioridad');
            $table->integer('tiempo_estimado');
            $table->string('titulo_hu');
            $table->string('criterios_aceptacion');
            $table->string('mockup');
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
        Schema::dropIfExists('historia_usuario');
    }
}
