<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FuncionarioAnexo;

class FuncionarioAnexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FuncionarioAnexo::factory()
            ->count(5)
            ->create();
    }
}
