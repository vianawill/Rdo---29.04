<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveQuantidadeAndHorasTrabalhadasAndObraIdFromMaoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mao_obras', function (Blueprint $table) {
            $table->dropColumn('quantidade'); //remove a coluna quantidade
            $table->dropColumn('horas_trabalhadas'); //remove a coluna horas_trabalhadas
            $table->dropColumn('obra_id'); //remove a coluna obra_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mao_obras', function (Blueprint $table) {
            $table->integer('quantidade')->nullable();
            $table->decimal('horas_trabalhadas');
            $table->foreign('obra_id');
        });
    }
}
