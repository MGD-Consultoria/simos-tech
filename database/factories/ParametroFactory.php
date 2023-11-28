<?php

namespace Database\Factories;

use App\Enums\Parametros;
use App\Enums\UnidadeMedida;
use App\Models\Parametro;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParametroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parametro::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement(Parametros::toValues()),
            'unidade_medida' => $this->faker->randomElement(UnidadeMedida::toValues()),
            'escala_permitida_inicial' => $this->faker->randomNumber(1),
            'escala_permitida_final' => $this->faker->randomNumber(3),
        ];
    }
}
