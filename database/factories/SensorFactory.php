<?php

namespace Database\Factories;

use App\Models\Sensor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SensorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sensor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->text(255),
            'modelo' => $this->faker->text(255),
            'data_fabricacao' => $this->faker->date(),
            'fabricante' => $this->faker->text(255),
            'faixa_medicao_inicial' => $this->faker->randomNumber(2),
            'faixa_medicao_final' => $this->faker->randomNumber(2),
            'latitude' => $this->faker->text(255),
            'logintude' => $this->faker->text(255),
            'frequencia_leitura_dados' => $this->faker->randomNumber(2),
            'equipamento_id' => \App\Models\Equipamento::factory(),
        ];
    }
}
