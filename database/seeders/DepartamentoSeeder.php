<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Empresa;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $departamentos = [
            [
                'nome' => 'Recursos Humanos',
                'categoria' => 'Administrativo',
                'descricao' => 'Gerencia a contratação, o treinamento e o bem-estar dos funcionários.',
            ],
            [
                'nome' => 'Finanças e Contabilidade',
                'categoria' => 'Financeiro',
                'descricao' => 'Responsável pela contabilidade, finanças e auditorias.',
            ],
            [
                'nome' => 'Vendas e Marketing',
                'categoria' => 'Comercial',
                'descricao' => 'Desenvolve estratégias de vendas e campanhas de marketing.',
            ],
            [
                'nome' => 'Operações ou Produção',
                'categoria' => 'Operacional',
                'descricao' => 'Focado na produção de bens e gerenciamento da cadeia de suprimentos.',
            ],
            [
                'nome' => 'Tecnologia da Informação',
                'categoria' => 'Tecnologia',
                'descricao' => 'Gerencia a infraestrutura de TI e a segurança da informação.',
            ],
            [
                'nome' => 'Pesquisa e Desenvolvimento',
                'categoria' => 'Inovação',
                'descricao' => 'Dedicado à inovação e desenvolvimento de novos produtos.',
            ],
            [
                'nome' => 'Atendimento ao Cliente',
                'categoria' => 'Serviço',
                'descricao' => 'Responsável pelo suporte e satisfação dos clientes.',
            ],
            [
                'nome' => 'Logística e Distribuição',
                'categoria' => 'Logística',
                'descricao' => 'Gerencia o transporte e a distribuição de mercadorias.',
            ],
            [
                'nome' => 'Jurídico',
                'categoria' => 'Legal',
                'descricao' => 'Encarregado das questões legais e contratuais da empresa.',
            ],
            [
                'nome' => 'Compras ou Aquisições',
                'categoria' => 'Suprimentos',
                'descricao' => 'Responsável pelas compras de materiais e gestão de fornecedores.',
            ],
        ];

        $empresas = Empresa::get();
        foreach ($empresas as $empresa) {
            foreach ($departamentos as $departamento) {

                Departamento::create([
                    'nome' => $departamento['nome'],
                    'categoria' => $departamento['categoria'],
                    'descricao' => $departamento['descricao'],
                    'responsavel_id' => null,
                    'gestor_id' => null,
                    'empresa_id' => $empresa->id,
                ]);
            }
        }
    }
}
