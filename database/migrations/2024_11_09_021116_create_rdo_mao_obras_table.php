<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdoMaoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdo_mao_obras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rdo_id')->constrained()->onDelete('cascade');  // Relaciona com a tabela RDO
            $table->foreignId('mao_obra_id')->constrained()->onDelete('cascade');  // Relaciona com a tabela Mão de Obra
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
        Schema::dropIfExists('rdo_mao_obras');
    }
}
