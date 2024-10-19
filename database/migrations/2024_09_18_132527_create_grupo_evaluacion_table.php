<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoEvaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_evaluacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evaluacion')->constrained('evaluacion')->onDelete('cascade');
            $table->foreignId('id_grupo')->nullable()->constrained('grupo')->onDelete('cascade');
            $table->foreignId('id_usuario')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('id_grupo_aux')->nullable()->constrained('grupo')->onDelete('cascade');
            $table->foreignId('id_usuario_aux')->nullable()->constrained('users')->onDelete('cascade');
            $table->boolean('estado_evaluacion');
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
        Schema::dropIfExists('grupo_evaluacion');
    }
}
