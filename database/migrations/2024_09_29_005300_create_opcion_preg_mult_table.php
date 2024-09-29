<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionPregMultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcion_preg_mult', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pregunta_multiple')->constrained('pregunta_opcion_multiple')->onDelete('cascade');
            $table->string('opcion_pregunta');
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
        Schema::dropIfExists('opcion_preg_mult');
    }
}
