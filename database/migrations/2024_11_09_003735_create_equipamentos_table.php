<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome do equipamento
            $table->string('tipo'); // Tipo do equipamento (ex: "Escavadeira", "Betoneira", etc.)
            $table->decimal('quantidade', 10, 2); // Quantidade do equipamento (em unidades ou horas de uso)
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade'); // Relacionamento com a tabela 'obras'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
}
