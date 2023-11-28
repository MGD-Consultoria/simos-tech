<?php

namespace Database\Factories;

use App\Models\Atribuicao;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtribuicaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atribuicao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
        ];
    }
}
