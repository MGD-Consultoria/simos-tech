<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TipoColaborador;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoColaboradorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoColaborador::class;

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
