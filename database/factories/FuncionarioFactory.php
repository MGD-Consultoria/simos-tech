<?php

namespace Database\Factories;

use App\Enums\EspecificacaoPagamento;
use App\Enums\MetodoPagamento;
use App\Enums\PlanoPagamento;
use App\Enums\TipoContrato;
use App\Enums\TipoFornecedor;
use App\Models\Atribuicao;
use App\Models\Cidade;
use App\Models\Departamento;
use App\Models\Funcionario;
use App\Models\TipoColaborador;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Funcionario::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cidade = Cidade::query()->inRandomOrder()->first();
        $departamento = Departamento::query()->inRandomOrder()->first();
        $atribuicao = Atribuicao::query()->inRandomOrder()->first();
        $tipo_colaborador = TipoColaborador::query()->inRandomOrder()->first();

        return [
            'nome' => $this->faker->name(),
            'nascimento' => $this->faker->date(),
            'nome_social' => $this->faker->name(),
            'genero' => $this->faker->randomElement(['masculino', 'feminino']),
            'sexo' => $this->faker->randomElement(['masculino', 'feminino']),
            'pcd' => $this->faker->boolean(),
            'data_admissao' => $this->faker->date(),
            'data_rescisao' => $this->faker->date(),
            'inicio_atribuicao' => $this->faker->date(),
            'fim_atribuicao' => $this->faker->date(),
            'data_expiracao' => $this->faker->date(),
            'tipo_contrato' => $this->faker->randomElement(TipoContrato::toArray()),
            'tempo_servico' => null,
            'cpf' => $this->faker->cpf(false),
            'rg' => $this->faker->rg(false),
            'titulo_eleitor' => $this->faker->numerify('#######'),
            'cartao_sus' => $this->faker->numerify('#######'),
            'carteira_trabalho' => $this->faker->numerify('#######'),
            'cnh' => $this->faker->numerify('#######'),
            'telefone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'estado_civil' => $this->faker->randomElement(['casado(a)', 'solteiro(a)','divorciado(a)','viuvo(a)']),
            'alocacao' => '',
            'conjuge_nome' => $this->faker->name(),
            'conjuge_nascimento' => $this->faker->date(),
            'cep' => $this->faker->postcode(),
            'rua' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => null,
            'bairro' => $this->faker->citySuffix(),
            'cidade_id' => $cidade->id,
            'estado_id' => $cidade->estado_id,
            'conta_bancaria' => $this->faker->numerify('#######'),
            'metodo_pagamento' => $this->faker->randomElement(MetodoPagamento::toArray()),
            'especificacao_pagamento' => $this->faker->randomElement(EspecificacaoPagamento::toArray()),
            'plano_pagamento' => $this->faker->randomElement(PlanoPagamento::toArray()),
            'desconto' => null,
            'dia_pagamento' => 10,
            'atribuicao_id' => $atribuicao->id,
            'tipo_colaborador_id' => $tipo_colaborador->id,
            'departamento_id' => $departamento->id,
        ];

    }

}
