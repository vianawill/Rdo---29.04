<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColunasManhaTardeNoiteFromRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            $table->dropColumn(['manha', 'tarde', 'noite']);
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
            $table->string('manha')->nullable();
            $table->string('tarde')->nullable();
            $table->string('noite')->nullable();
        });
    }
}
