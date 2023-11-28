<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Departamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Departamento::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
            'categoria' => $this->faker->text(255),
            'descricao' => $this->faker->text(255),
            'responsavel_id' => \App\Models\Funcionario::factory(),
            'gestor_id' => \App\Models\Funcionario::factory(),
            'empresa_id' => \App\Models\Empresa::factory(),
        ];
    }
}
