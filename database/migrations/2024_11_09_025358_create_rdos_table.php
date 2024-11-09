<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rdos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_rdo')->unique();
            $table->date('data_atual');
            $table->string('dia_da_semana');
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade'); // Relacionamento com a tabela 'obras'
    
            // Campos para condições temporais
            $table->enum('manha', ['Bom', 'Chuva leve', 'Chuva forte']);
            $table->enum('tarde', ['Bom', 'Chuva leve', 'Chuva forte']);
            $table->enum('noite', ['Bom', 'Chuva leve', 'Chuva forte']);
            
            // Campo para condições da área
            $table->enum('condicao_area', ['Operável', 'Operável parcialmente', 'Inoperável']);
    
            // Campo para acidentes
            $table->enum('acidente', ['Nao houve', 'Sem afastamento', 'Com afastamento']);

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
        Schema::dropIfExists('rdos');
    }
}
