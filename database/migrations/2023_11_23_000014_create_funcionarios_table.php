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
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->date('nascimento')->nullable();
            $table->string('nome_social')->nullable();
            $table->unsignedBigInteger('tipo_colaborador_id')->nullable();
            $table->string('genero')->nullable();
            $table->string('sexo')->nullable();
            $table->boolean('pcd')->nullable();
            $table->date('data_admissao')->nullable();
            $table->date('data_rescisao')->nullable();
            $table->unsignedBigInteger('atribuicao_id')->nullable();
            $table->date('inicio_atribuicao')->nullable();
            $table->date('fim_atribuicao')->nullable();
            $table->date('data_expiracao')->nullable();
            $table->string('tipo_contrato')->nullable();
            $table->string('tempo_servico')->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 9)->nullable();
            $table->string('titulo_eleitor')->nullable();
            $table->string('cartao_sus')->nullable();
            $table->string('carteira_trabalho')->nullable();
            $table->string('cnh')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('alocacao')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->string('conjuge_nome')->nullable();
            $table->string('conjuge_nascimento')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->string('conta_bancaria')->nullable();
            $table->string('metodo_pagamento')->nullable();
            $table->string('especificacao_pagamento')->nullable();
            $table->string('plano_pagamento')->nullable();
            $table->string('desconto')->nullable();
            $table->string('dia_pagamento')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
