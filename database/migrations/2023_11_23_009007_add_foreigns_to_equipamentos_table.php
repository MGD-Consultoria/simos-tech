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
        Schema::table('equipamentos', function (Blueprint $table) {
            $table
                ->foreign('responsavel_id')
                ->references('id')
                ->on('funcionarios')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('fornecedor_id')
                ->references('id')
                ->on('fornecedores')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipamentos', function (Blueprint $table) {
            $table->dropForeign(['responsavel_id']);
            $table->dropForeign(['fornecedor_id']);
        });
    }
};
