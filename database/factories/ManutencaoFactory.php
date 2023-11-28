<?php

namespace Database\Factories;

use App\Models\Manutencao;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManutencaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manutencao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_manutencao' => $this->faker->randomNumber(0),
            'descricao' => $this->faker->text(255),
            'responsavel' => $this->faker->text(255),
            'tecnico' => $this->faker->text(255),
            'contato_tecnico' => $this->faker->text(255),
            'equipamento_id' => \App\Models\Equipamento::factory(),
        ];
    }
}
