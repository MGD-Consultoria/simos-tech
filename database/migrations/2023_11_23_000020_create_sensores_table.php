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
        Schema::create('sensores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable();
            $table->string('modelo')->nullable();
            $table->date('data_fabricacao')->nullable();
            $table->string('fabricante')->nullable();
            $table->float('faixa_medicao_inicial')->nullable();
            $table->float('faixa_medicao_final')->nullable();
            $table->unsignedBigInteger('equipamento_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('logintude')->nullable();
            $table->string('unidade_medida')->nullable();
            $table->string('codigo_identificacao')->nullable();
            $table->float('frequencia_leitura_dados')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensores');
    }
};
