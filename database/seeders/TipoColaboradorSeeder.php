<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoColaborador;

class TipoColaboradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoColaborador::create(['nome'=>'TRABALHADOR']);
        TipoColaborador::create(['nome'=>'TERCEIRIZADO']);
        TipoColaborador::create(['nome'=>'ESTAGIÁRIO']);
        TipoColaborador::create(['nome'=>'TEMPORÁRIO']);
    }
}
