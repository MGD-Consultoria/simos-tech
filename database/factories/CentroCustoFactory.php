<?php

namespace Database\Factories;

use App\Models\CentroCusto;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroCustoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CentroCusto::class;

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
