<?php

namespace Database\Factories;

use App\Enums\UnidadeMedida;
use App\Models\Norma;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NormaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Norma::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => 'Norma '.$this->faker->randomNumber(2),
            'sigla' => $this->faker->text(5),
            'descricao' => $this->faker->text(),
            'data_vigencia' => $this->faker->date(),
            'revisao' => null,
            'orgao_regulador' => $this->faker->company(),
            'unidade_medida' => $this->faker->randomElement(UnidadeMedida::toValues()),
            'escala_permitida_inicial' => $this->faker->randomNumber(2),
            'escala_permitida_final' => $this->faker->randomNumber(4),
            'escala_minima_bom' => $this->faker->randomNumber(2),
            'escala_maxima_bom' => $this->faker->randomNumber(4),
            'escala_minima_regular' => $this->faker->randomNumber(2),
            'escala_maxima_regular' => $this->faker->randomNumber(4),
            'escala_minima_irregular' => $this->faker->randomNumber(2),
            'escala_maxima_irregular' => $this->faker->randomNumber(4),
        ];
    }
}
