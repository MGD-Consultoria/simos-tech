<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CentroCustoEmpresa;

class CentroCustoEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentroCustoEmpresa::factory()
            ->count(5)
            ->create();
    }
}
