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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table
                ->foreign('cidade_id')
                ->references('id')
                ->on('cidades')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropForeign(['cidade_id']);
            $table->dropForeign(['estado_id']);
        });
    }
};
