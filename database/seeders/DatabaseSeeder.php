<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Equipamento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EstadoSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoColaboradorSeeder::class);
        $this->call(AtribuicaoSeeder::class);
        $this->call(EquipamentoCategoriaSeeder::class);
        $this->call(EmpresaSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(FuncionarioSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(EquipamentoSeeder::class);
        $this->call(ParametroSeeder::class);
        $this->call(NormaSeeder::class);


    }
}
