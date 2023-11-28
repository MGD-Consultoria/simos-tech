<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\EmpresaAnexo;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaAnexoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmpresaAnexo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
            'descricao' => $this->faker->text(),
            'link' => $this->faker->text(255),
            'tipo' => $this->faker->text(255),
            'empresa_id' => \App\Models\Empresa::factory(),
        ];
    }
}
