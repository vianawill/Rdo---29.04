<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveQuantidadeAndObraIdFromEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropForeign('equipamentos_obra_id_foreign'); //remove a chave estrangeira
            $table->dropColumn('obra_id'); //remove a coluna obra_id
            $table->dropColumn('quantidade'); //remove a coluna quantidade
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->integer('quantidade')->nullable(); // Se a quantidade for opcional, use nullable()
            $table->unsignedBigInteger('obra_id')->nullable(); // Se a obra_id for opcional, use nullable()
            
            // Adicionar a chave estrangeira caso necessário
            $table->foreign('obra_id')->references('id')->on('obras')->onDelete('set null');
        });
    }
}
