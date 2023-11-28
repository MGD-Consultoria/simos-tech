<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_serie')->nullable();
            $table->string('nome')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('ano_fabricacao')->nullable();
            $table->string('capacidade_desempenho')->nullable();
            $table->string('condicao_atual')->nullable();
            $table->text('observacao')->nullable();
            $table->date('data_compra')->nullable();
            $table->date('data_instalacao')->nullable();
            $table->date('ultima_manutencao')->nullable();
            $table->integer('periodicidade_manutencao')->nullable();
            $table->integer('garantia')->nullable();
            $table->string('localizacao_setor')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('responsavel_id')->nullable();
            $table->unsignedBigInteger('fornecedor_id')->nullable();
            $table->text('especificacoes_tecnicas')->nullable();

            $table->foreignId('categoria_id')->nullable()->constrained('equipamento_categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
