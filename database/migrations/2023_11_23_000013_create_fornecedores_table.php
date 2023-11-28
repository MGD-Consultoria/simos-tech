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
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('nome_fantasia')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('grupo')->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('inscricao_municipal')->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('ccm')->nullable();
            $table->string('cnae')->nullable();
            $table->string('naics')->nullable();
            $table->string('duns')->nullable();
            $table->string('nome')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nome_social')->nullable();
            $table->string('sexo')->nullable();
            $table->string('genero')->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 9)->nullable();
            $table->string('titulo_eleitor')->nullable();
            $table->string('cartao_sus')->nullable();
            $table->string('carteira_trabalho')->nullable();
            $table->string('cnh')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->string('conta_bancaria')->nullable();
            $table->string('metodo_pagamento')->nullable();
            $table->string('especificacao_pagamento')->nullable();
            $table->string('plano_pagamento')->nullable();
            $table->string('desconto')->nullable();
            $table->string('dia_pagamento')->nullable();
            $table->string('cod_internacional')->nullable();
            $table->string('moeda')->nullable();
            $table->boolean('ativo')->nullable();
            $table->boolean('estrangeiro')->nullable();
            $table->string('telefone_principal')->nullable();
            $table->string('email_principal')->nullable();
            $table->text('representante')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
