<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescricaoToObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('obras', function (Blueprint $table) {
            $table->text('descricao')->nullable()->after('data_real_termino_obra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obras', function (Blueprint $table) {
            $table->dropColumn('descricao');
        });
    }
}
