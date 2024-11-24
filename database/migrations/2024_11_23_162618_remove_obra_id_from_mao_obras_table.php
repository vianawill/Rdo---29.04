<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveObraIdFromMaoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mao_obras', function (Blueprint $table) {
            $table->dropForeign('mao_obras_obra_id_foreign'); //remove chave estrangeira
            $table->dropColumn('obra_id'); //remove coluna obra_id
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
            $table->foreign('obra_id')->references('id')->on('obras')->onDelete('set null');
            $table->integer('obra_id');
        });
    }
}
