<?php

namespace Database\Seeders;

use App\Models\CentroCusto;
use Illuminate\Database\Seeder;

class CentroCustoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentroCusto::factory()
            ->count(5)
            ->create();
    }
}
