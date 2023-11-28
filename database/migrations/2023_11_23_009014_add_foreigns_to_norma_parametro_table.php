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
        Schema::table('norma_parametro', function (Blueprint $table) {
            $table
                ->foreign('parametro_id')
                ->references('id')
                ->on('parametros')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('norma_id')
                ->references('id')
                ->on('normas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('norma_parametro', function (Blueprint $table) {
            $table->dropForeign(['parametro_id']);
            $table->dropForeign(['norma_id']);
        });
    }
};
