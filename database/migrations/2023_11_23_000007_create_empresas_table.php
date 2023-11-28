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
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_fantasia')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('inscricao_municipal')->nullable();
            $table->string('inscricao_estadual')->nullable();
            $table->string('cnae')->nullable();
            $table->string('ccm')->nullable();
            $table->string('naics')->nullable();
            $table->string('duns')->nullable();
            $table->text('representante')->nullable();
//            $table->string('representante_telefone')->nullable();
//            $table->string('representante_email')->nullable();
            $table->string('telefone_principal_empresa')->nullable();
            $table->string('email_principal_empresa')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_relatorio')->nullable();
            $table->string('cod_internacional')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->unsignedBigInteger('empresa_id')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
