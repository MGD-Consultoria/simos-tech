<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sqlFile = database_path('sqls/cidade.sql');

        // Verificar se o arquivo existe
        if (File::exists($sqlFile)) {
            // Ler o conteúdo do arquivo SQL
            $sql = File::get($sqlFile);

            // Executar o SQL
            DB::statement($sql);

            $this->command->info('Arquivo SQL executado com sucesso.');
        } else {
            $this->command->error('Arquivo SQL não encontrado.');
        }
    }
}
