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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table
                ->foreign('tipo_colaborador_id')
                ->references('id')
                ->on('tipo_colaboradores')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('atribuicao_id')
                ->references('id')
                ->on('atribuicoes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('departamento_id')
                ->references('id')
                ->on('departamentos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('cidade_id')
                ->references('id')
                ->on('cidades')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->dropForeign(['tipo_colaborador_id']);
            $table->dropForeign(['atribuicao_id']);
            $table->dropForeign(['departamento_id']);
            $table->dropForeign(['estado_id']);
            $table->dropForeign(['cidade_id']);
        });
    }
};
