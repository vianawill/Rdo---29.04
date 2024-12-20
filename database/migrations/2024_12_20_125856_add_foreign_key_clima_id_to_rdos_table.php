<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyClimaIdToRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            // adicionar chave estrangeira para clima_id
            $table->foreign('clima_id')->references('id')->on('climas')->onDelete('cascade');
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
            // remover chave estrangeira de clima_id
            $table->dropForeign(['clima_id']);
        });
    }
}
