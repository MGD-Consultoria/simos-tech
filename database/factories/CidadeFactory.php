<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cidade::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
            'ibge' => $this->faker->randomNumber(0),
            'estado_id' => \App\Models\Estado::factory(),
        ];
    }
}
