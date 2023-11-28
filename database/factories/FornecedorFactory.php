<?php

namespace Database\Factories;

use App\Enums\EspecificacaoPagamento;
use App\Enums\GrupoFornecedor;
use App\Enums\MetodoPagamento;
use App\Enums\PlanoPagamento;
use App\Enums\TipoContrato;
use App\Enums\TipoFornecedor;
use App\Models\Cidade;
use App\Models\Fornecedor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fornecedor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $tipo = $this->faker->randomElement(TipoFornecedor::toArray());
        $data = [
            'tipo' => $tipo
        ];
        if ($tipo == TipoFornecedor::PJ()) {

            $data['nome_fantasia'] = $this->faker->company();
            $data['razao_social'] = $this->faker->company();
            $data['grupo'] = $this->faker->randomElement(GrupoFornecedor::toArray());
            $data['cnpj'] = $this->faker->cnpj(false);
            $data['inscricao_municipal'] = $this->faker->numerify('###########');
            $data['inscricao_estadual'] = $this->faker->numerify('#########');
            $data['cnae'] = $this->faker->numerify('#######');
            $data['ccm'] = $this->faker->numerify('#######');
            $data['naics'] = $this->faker->numerify('#######');
            $data['duns'] = $this->faker->numerify('#######');
        } else {
            $data['nome'] = $this->faker->name();
            $data['data_nascimento'] = $this->faker->date();
            $data['nome_social'] = $this->faker->name();
            $data['sexo'] = $this->faker->numerify('###########');
            $data['genero'] = $this->faker->numerify('#########');
            $data['cpf'] = $this->faker->cpf(false);
            $data['rg'] = $this->faker->rg(false);
            $data['titulo_eleitor'] = $this->faker->numerify('#######');
            $data['cartao_sus'] = $this->faker->numerify('#######');
            $data['carteira_trabalho'] = $this->faker->numerify('#######');
            $data['cnh'] = $this->faker->numerify('#######');
        }

        $cidade = Cidade::query()->inRandomOrder()->first();

        $data['cep'] = $this->faker->postcode();
        $data['rua'] = $this->faker->streetName();
        $data['numero'] = $this->faker->buildingNumber();
        $data['complemento'] = null;
        $data['bairro'] = $this->faker->citySuffix();
        $data['estado_id'] = $cidade->estado_id;
        $data['cidade_id'] = $cidade->id;
        $data['conta_bancaria'] = $this->faker->numerify('#######');
        $data['metodo_pagamento'] = $this->faker->randomElement(MetodoPagamento::toArray());
        $data['especificacao_pagamento'] = $this->faker->randomElement(EspecificacaoPagamento::toArray());
        $data['plano_pagamento'] = $this->faker->randomElement(PlanoPagamento::toArray());
        $data['desconto'] = null;
        $data['dia_pagamento'] = 10;
        $data['ativo'] = $this->faker->boolean();
        $data['estrangeiro'] = $this->faker->boolean();
        $data['cod_internacional'] = null;
        $data['telefone_principal'] = $this->faker->phoneNumber();
        $data['email_principal'] = $this->faker->companyEmail();
        $data['representante'] = null;

        return $data;
    }
}
