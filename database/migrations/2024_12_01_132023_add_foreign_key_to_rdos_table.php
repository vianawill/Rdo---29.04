<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rdos', function (Blueprint $table) {
            //adiciona a chave estrangeira, não sei porque não existe desde a primeira migrate
            if (!Schema::hasColumn('rdos', 'obra_id')) {
                $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
            }
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
            //remove a chave estrangeira
            $table->dropForeign(['obra_id']);
        });
    }
}
