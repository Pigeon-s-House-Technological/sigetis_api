<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hu')->constrained('historia_usuario')->onDetelete('cascade');
            $table->foreignId('id_usuario')->constrained('usuario')->onDetelete('cascade');
            $table->string('nombre_actividad');
            $table->string('estado_actividad');
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
        Schema::dropIfExists('actividad');
    }
}
