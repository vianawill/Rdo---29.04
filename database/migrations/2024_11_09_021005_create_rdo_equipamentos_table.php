<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdoEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdo_equipamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rdo_id')->constrained()->onDelete('cascade');  // Relaciona com a tabela RDO
            $table->foreignId('equipamento_id')->constrained()->onDelete('cascade');  // Relaciona com a tabela Equipamentos
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
        Schema::dropIfExists('rdo_equipamentos');
    }
}
