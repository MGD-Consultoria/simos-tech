<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            ['id' => 1, 'nome' => 'Acre', 'uf' => 'AC', 'ibge' => 12, 'ddd' => '68'],
            ['id' => 2, 'nome' => 'Alagoas', 'uf' => 'AL', 'ibge' => 27, 'ddd' => '82'],
            ['id' => 3, 'nome' => 'Amazonas', 'uf' => 'AM', 'ibge' => 13, 'ddd' => '97,92'],
            ['id' => 4, 'nome' => 'Amapá', 'uf' => 'AP', 'ibge' => 16, 'ddd' => '96'],
            ['id' => 5, 'nome' => 'Bahia', 'uf' => 'BA', 'ibge' => 29, 'ddd' => '77,75,73,74,71'],
            ['id' => 6, 'nome' => 'Ceará', 'uf' => 'CE', 'ibge' => 23, 'ddd' => '88,85'],
            ['id' => 7, 'nome' => 'Distrito Federal', 'uf' => 'DF', 'ibge' => 53, 'ddd' => '61'],
            ['id' => 8, 'nome' => 'Espírito Santo', 'uf' => 'ES', 'ibge' => 32, 'ddd' => '28,27'],
            ['id' => 9, 'nome' => 'Goiás', 'uf' => 'GO', 'ibge' => 52, 'ddd' => '62,64,61'],
            ['id' => 10, 'nome' => 'Maranhão', 'uf' => 'MA', 'ibge' => 21, 'ddd' => '99,98'],
            ['id' => 11, 'nome' => 'Minas Gerais', 'uf' => 'MG', 'ibge' => 31, 'ddd' => '34,37,31,33,35,38,32'],
            ['id' => 12, 'nome' => 'Mato Grosso do Sul', 'uf' => 'MS', 'ibge' => 50, 'ddd' => '67'],
            ['id' => 13, 'nome' => 'Mato Grosso', 'uf' => 'MT', 'ibge' => 51, 'ddd' => '65,66'],
            ['id' => 14, 'nome' => 'Pará', 'uf' => 'PA', 'ibge' => 15, 'ddd' => '91,94,93'],
            ['id' => 15, 'nome' => 'Paraíba', 'uf' => 'PB', 'ibge' => 25, 'ddd' => '83'],
            ['id' => 16, 'nome' => 'Pernambuco', 'uf' => 'PE', 'ibge' => 26, 'ddd' => '81,87'],
            ['id' => 17, 'nome' => 'Piauí', 'uf' => 'PI', 'ibge' => 22, 'ddd' => '89,86'],
            ['id' => 18, 'nome' => 'Paraná', 'uf' => 'PR', 'ibge' => 41, 'ddd' => '43,41,42,44,45,46'],
            ['id' => 19, 'nome' => 'Rio de Janeiro', 'uf' => 'RJ', 'ibge' => 33, 'ddd' => '24,22,21'],
            ['id' => 20, 'nome' => 'Rio Grande do Norte', 'uf' => 'RN', 'ibge' => 24, 'ddd' => '84'],
            ['id' => 21, 'nome' => 'Rondônia', 'uf' => 'RO', 'ibge' => 11, 'ddd' => '69'],
            ['id' => 22, 'nome' => 'Roraima', 'uf' => 'RR', 'ibge' => 14, 'ddd' => '95'],
            ['id' => 23, 'nome' => 'Rio Grande do Sul', 'uf' => 'RS', 'ibge' => 43, 'ddd' => '53,54,55,51'],
            ['id' => 24, 'nome' => 'Santa Catarina', 'uf' => 'SC', 'ibge' => 42, 'ddd' => '47,48,49'],
            ['id' => 25, 'nome' => 'Sergipe', 'uf' => 'SE', 'ibge' => 28, 'ddd' => '79'],
            ['id' => 26, 'nome' => 'São Paulo', 'uf' => 'SP', 'ibge' => 35, 'ddd' => '11,12,13,14,15,16,17,18,19'],
            ['id' => 27, 'nome' => 'Tocantins', 'uf' => 'TO', 'ibge' => 17, 'ddd' => '63'],
        ];


        Estado::insert($estados);
    }
}
