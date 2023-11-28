<?php

namespace Database\Factories;

use App\Models\Filho;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilhoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filho::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->text(255),
            'data_nascimento' => $this->faker->date(),
            'funcionario_id' => \App\Models\Funcionario::factory(),
        ];
    }
}
