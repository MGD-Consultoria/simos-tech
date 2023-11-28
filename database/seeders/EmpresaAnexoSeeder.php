<?php

namespace Database\Seeders;

use App\Models\EmpresaAnexo;
use Illuminate\Database\Seeder;

class EmpresaAnexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmpresaAnexo::factory()
            ->count(5)
            ->create();
    }
}
