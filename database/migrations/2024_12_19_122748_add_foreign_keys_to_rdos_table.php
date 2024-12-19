<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // adicionar chave estrangeira para condicao_id
            // $table->foreign('condicao_id')->references('id')->on('condicao_areas')->onDelete('cascade');
            // adicionar chave estrangeira para acidente_id
            $table->foreign('acidente_id')->references('id')->on('acidentes')->onDelete('cascade');
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
            // remover chave estrangeira de condicao_id
            $table->dropForeign(['condicao_id']);
            // remover chave estrangeira de acidente_id
            $table->dropForeign(['acidente_id']);
        });
    }
}
