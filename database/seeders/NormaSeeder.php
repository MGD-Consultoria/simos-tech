<?php

namespace Database\Seeders;

use App\Enums\Parametros;
use App\Models\Equipamento;
use App\Models\Norma;
use App\Models\Parametro;
use Illuminate\Database\Seeder;

class NormaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $normas = Norma::factory()
            ->count(3)
            ->create();

        foreach($normas as $norma){
            $equipamentos = Equipamento::query()->inRandomOrder()->limit(3)->pluck('id')->toArray();
            $norma->equipamentos()->attach($equipamentos);

            $parametros = Parametro::query()->inRandomOrder()->limit(3)->pluck('id')->toArray();
            $norma->parametros()->attach($parametros);
        }
    }
}
