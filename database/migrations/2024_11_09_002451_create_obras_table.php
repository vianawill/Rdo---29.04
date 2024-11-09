<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('empresa_contratada');
            $table->string('objeto_contrato');
            $table->string('tempo_total_contrato');
            $table->date('data_prevista_inicio_obra');
            $table->date('data_real_inicio_obra')->nullable();
            $table->date('data_prevista_termino_obra');
            $table->date('data_real_termino_obra')->nullable();
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
        Schema::dropIfExists('obras');
    }
}
