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
            $table->foreignId('id_sprint')->constrained('sprint')->onDelete('cascade');
            $table->string('identificador_hu')->nullable();
            $table->string('prerrequisitos')->nullable();
            $table->string('descripcion_hu')->nullable();
            $table->integer('prioridad')->nullable();
            $table->integer('tiempo_estimado')->nullable();
            $table->string('titulo_hu');
            $table->string('criterios_aceptacion')->nullable();
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