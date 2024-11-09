<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEquipamentosUtilizadosAndMaoDeObraUtilizadaFromRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // Removendo as colunas 'equipamentos_utilizados' e 'mao_de_obra_utilizada'
            $table->dropColumn('equipamentos_utilizados');
            $table->dropColumn('mao_de_obra_utilizada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // Se for necessário reverter a migration, recrie as colunas
            $table->text('equipamentos_utilizados')->nullable();
            $table->text('mao_de_obra_utilizada')->nullable();
        });
    }
}
