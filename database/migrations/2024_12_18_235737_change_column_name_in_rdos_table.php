<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameInRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // alterar nome de colunas
            $table->renameColumn('condicao_area', 'condicao_id');
            $table->renameColumn('acidente', 'acidente_id');
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
            // reverte a alteração do nome
            $table->renameColumn('condicao_id', 'condicao_area');
            $table->renameColumn('acidente_id', 'acidente');
        });
    }
}
