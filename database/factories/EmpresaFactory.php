<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Empresa;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cidade = Cidade::query()->inRandomOrder()->first();
        return [
            'nome_fantasia' => $this->faker->company(),
            'razao_social' => $this->faker->company(),
            'cnpj' => $this->faker->cnpj(false),
            'inscricao_municipal' => $this->faker->numerify('###########'),
            'inscricao_estadual' => $this->faker->numerify(9),
            'cnae' => $this->faker->numerify('#######'),
            'ccm' => $this->faker->numerify('#######'),
            'naics' => $this->faker->numerify('#######'),
            'duns' => $this->faker->numerify('#######'),
            'representante' => null,
            'telefone_principal_empresa' => $this->faker->phoneNumber(),
            'email_principal_empresa' => $this->faker->companyEmail(),
            'logo' =>null,
            'logo_relatorio' =>null,
            'cod_internacional' => null,
            'cep' => $this->faker->postcode(),
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => null,
            'bairro' => $this->faker->citySuffix(),
            'estado_id' => $cidade->estado_id,
            'cidade_id' => $cidade->id,
            'empresa_id' => null,
        ];
    }
}
