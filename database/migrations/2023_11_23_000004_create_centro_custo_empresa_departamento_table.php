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
        Schema::create('centro_custo_empresa_departamento', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('centro_custo_empresa_id');
            $table->unsignedBigInteger('departamento_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centro_custo_empresa_departamento');
    }
};
