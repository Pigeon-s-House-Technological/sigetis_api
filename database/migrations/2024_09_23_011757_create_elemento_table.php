<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_actividad')->constrained('actividad')->onDelete('cascade');
            $table->string('nombre_elemento');
            $table->string('descripcion_elemento')->nullable();
            $table->string('link_elemento')->nullable();
            $table->string('archivo_elemento')->nullable();
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
        Schema::dropIfExists('elemento');
    }
}
