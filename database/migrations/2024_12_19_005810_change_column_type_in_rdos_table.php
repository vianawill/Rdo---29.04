<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeInRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // alterar o tipo da coluna
            $table->bigInteger('acidente_id')->change();
            $table->bigInteger('condicao_id')->change();
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
            // desfazer alteração do tipo da coluna
            $table->string('acidente_id')->change();
            $table->string('condicao_id')->change();
        });
    }
}
