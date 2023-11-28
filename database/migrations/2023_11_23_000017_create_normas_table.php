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
        Schema::create('normas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->string('sigla')->nullable();
            $table->text('descricao')->nullable();
            $table->date('data_vigencia')->nullable();
            $table->string('unidade_medida')->nullable();
            $table->float('escala_permitida_inicial')->nullable();
            $table->float('escala_permitida_final')->nullable();
            $table->float('escala_minima_bom')->nullable();
            $table->float('escala_maxima_bom')->nullable();
            $table->float('escala_minima_regular')->nullable();
            $table->float('escala_maxima_regular')->nullable();
            $table->float('escala_minima_irregular')->nullable();
            $table->float('escala_maxima_irregular')->nullable();
            $table->string('revisao')->nullable();
            $table->string('orgao_regulador')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normas');
    }
};
