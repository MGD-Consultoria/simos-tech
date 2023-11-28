<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\FuncionarioAnexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioAnexoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FuncionarioAnexo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
            'arquivo' => $this->faker->text(255),
            'funcionario_id' => \App\Models\Funcionario::factory(),
        ];
    }
}
