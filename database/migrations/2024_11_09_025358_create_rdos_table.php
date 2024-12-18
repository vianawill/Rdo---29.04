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
            $table->date('data'); // antes era data_atual
            // Adiciona chave estrangeira para relacionamento com a tabela 'obras'
            // if (!Schema::hasColumn('rdos', 'obra_id')) { // estava assim na migration de adição de chave estrangeira
            $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
            // }

            // adicionando colunas para os 3 turnos e climas
            // antes adicionado por outra migration
            $table->unsignedBigInteger('turno_id_manha');
            $table->unsignedBigInteger('clima_id_manha');

            $table->unsignedBigInteger('turno_id_tarde');
            $table->unsignedBigInteger('clima_id_tarde');
    
            $table->unsignedBigInteger('turno_id_noite');
            $table->unsignedBigInteger('clima_id_noite');

            // definindo as chaves estrangeiras
            // antes adicionado por outra migration
            $table->foreign('turno_id_manha')->references('id')->on('turnos')->onDelete('cascade');
            $table->foreign('clima_id_manha')->references('id')->on('climas')->onDelete('cascade');
            
            $table->foreign('turno_id_tarde')->references('id')->on('turnos')->onDelete('cascade');
            $table->foreign('clima_id_tarde')->references('id')->on('climas')->onDelete('cascade');
            
            $table->foreign('turno_id_noite')->references('id')->on('turnos')->onDelete('cascade');
            $table->foreign('clima_id_noite')->references('id')->on('climas')->onDelete('cascade');
    
            
            
            // Campo para condições da área
            $table->enum('condicao_area', ['Operável', 'Operável parcialmente', 'Inoperável']);
    
            // Campo para acidentes
            $table->enum('acidente', ['Não houve', 'Sem afastamento', 'Com afastamento']);

            $table->timestamps();

            /* Removidas
            $table->string('dia_da_semana');
            $table->text('equipamentos_utilizados')->nullable();
            $table->text('mao_de_obra_utilizada')->nullable();
            // Campos para condições temporais
            $table->enum('manha', ['Bom', 'Chuva leve', 'Chuva forte']);
            $table->enum('tarde', ['Bom', 'Chuva leve', 'Chuva forte']);
            $table->enum('noite', ['Bom', 'Chuva leve', 'Chuva forte']);
            */
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
