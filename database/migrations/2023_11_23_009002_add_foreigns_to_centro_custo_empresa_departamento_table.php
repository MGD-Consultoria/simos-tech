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
        Schema::table('centro_custo_empresa_departamento', function (
            Blueprint $table
        ) {
            $table
                ->foreign('centro_custo_empresa_id', 'foreign_alias_0000001')
                ->references('id')
                ->on('centro_custos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('centro_custo_empresa_departamento', function (
            Blueprint $table
        ) {
            $table->dropForeign(['centro_custo_empresa_id']);
            $table->dropForeign(['departamento_id']);
        });
    }
};
