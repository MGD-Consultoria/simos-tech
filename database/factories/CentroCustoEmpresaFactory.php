<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CentroCustoEmpresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroCustoEmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CentroCustoEmpresa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empresa_id' => \App\Models\Empresa::factory(),
            'centro_custo_id' => \App\Models\CentroCusto::factory(),
        ];
    }
}
