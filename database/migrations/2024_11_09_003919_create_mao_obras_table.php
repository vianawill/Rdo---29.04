<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaoObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mao_obras', function (Blueprint $table) {
            $table->id();
            $table->string('funcao'); // Função do trabalhador (ex: pedreiro, carpinteiro, etc.)
            $table->integer('quantidade'); // Quantidade de trabalhadores dessa função
            $table->decimal('horas_trabalhadas', 10, 2); // Horas trabalhadas no dia
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
        Schema::dropIfExists('mao_obras');
    }
}
