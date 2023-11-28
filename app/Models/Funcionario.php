<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Funcionario extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'nascimento',
        'nome_social',
        'tipo_colaborador_id',
        'genero',
        'sexo',
        'pcd',
        'data_admissao',
        'data_rescisao',
        'atribuicao_id',
        'inicio_atribuicao',
        'fim_atribuicao',
        'data_expiracao',
        'tipo_contrato',
        'tempo_servico',
        'cpf',
        'rg',
        'titulo_eleitor',
        'cartao_sus',
        'carteira_trabalho',
        'cnh',
        'telefone',
        'email',
        'estado_civil',
        'alocacao',
        'departamento_id',
        'conjuge_nome',
        'conjuge_nascimento',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'estado_id',
        'cidade_id',
        'conta_bancaria',
        'metodo_pagamento',
        'especificacao_pagamento',
        'plano_pagamento',
        'desconto',
        'dia_pagamento',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'pcd' => 'boolean',
        'data_admissao' => 'date',
        'data_rescisao' => 'date',
        'inicio_atribuicao' => 'date',
        'fim_atribuicao' => 'date',
        'data_expiracao' => 'date',
    ];

    public function atribuicao()
    {
        return $this->belongsTo(Atribuicao::class);
    }

    public function tipoColaborador()
    {
        return $this->belongsTo(TipoColaborador::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'responsavel_id');
    }

    public function departamentos2()
    {
        return $this->hasMany(Departamento::class, 'gestor_id');
    }

    public function funcionarioAnexos()
    {
        return $this->hasMany(FuncionarioAnexo::class);
    }

    public function filhos()
    {
        return $this->hasMany(Filho::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class, 'responsavel_id');
    }
}
