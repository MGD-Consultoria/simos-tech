<?php

namespace Database\Seeders;

use App\Models\Atribuicao;
use Illuminate\Database\Seeder;

class AtribuicaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Atribuicao::create(['nome'=>'GERENTE']);
        Atribuicao::create(['nome'=>'CONTADOR']);
        Atribuicao::create(['nome'=>'TÉCNICO SUPORTE']);
    }
}
