<?php

namespace Database\Factories;

use App\Enums\CondicaoEquipamento;
use App\Models\Equipamento;
use App\Models\EquipamentoCategoria;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipamento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $equipamentoCategoria = EquipamentoCategoria::query()->inRandomOrder()->first();
        $fornecedor = Fornecedor::query()->inRandomOrder()->first();
        $responsavel = Funcionario::query()->inRandomOrder()->first();

        return [
            'numero_serie' => $this->faker->numerify('##############'),
            'nome' => 'Equipamento '.$this->faker->randomNumber(2),
            'categoria_id' => $equipamentoCategoria->id,
            'fabricante' =>$this->faker->company(),
            'ano_fabricacao' => $this->faker->year(),
            'capacidade_desempenho' => null,
            'condicao_atual' => $this->faker->randomElement(CondicaoEquipamento::toArray()),
            'observacao' => $this->faker->text(),
            'especificacoes_tecnicas' => $this->faker->text(),
            'data_compra' => $this->faker->date(),
            'data_instalacao' => $this->faker->date(),
            'ultima_manutencao' => $this->faker->date(),
            'periodicidade_manutencao' => $this->faker->randomNumber(2),
            'garantia' => 360,
            'localizacao_setor' => $this->faker->firstName(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'responsavel_id' => $responsavel->id,
            'fornecedor_id' => $fornecedor->id,
        ];
    }
}
