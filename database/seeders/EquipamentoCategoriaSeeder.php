<?php

namespace Database\Seeders;

use App\Models\EquipamentoCategoria;
use Illuminate\Database\Seeder;

class EquipamentoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Esteira',
            'Estufa',
            'Balança',
            'Máquinas de Produção',
            'Veículos Industriais',
            'Equipamentos de Laboratório',
            'Equipamentos de Refrigeração',
            'Máquinas de Corte',
            'Equipamentos de Embalagem',
            'Equipamentos de Medição',
            'Equipamentos de Soldagem',
            'Instrumentação Eletrônica',
            'Dispositivos de Manuseio de Materiais',
            'Sistemas de Controle Automatizado',
            'Equipamentos de Teste e Inspeção'
        ];

        foreach ($categorias as $nome) {
            EquipamentoCategoria::create(['nome' => $nome]);
        }
    }
}
