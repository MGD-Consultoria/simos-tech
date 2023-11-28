<?php

namespace Database\Seeders;

use App\Models\Manutencao;
use Illuminate\Database\Seeder;

class ManutencaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Manutencao::factory()
            ->count(5)
            ->create();
    }
}
