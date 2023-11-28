<?php

namespace App\Models;

use App\Enums\TipoFornecedor;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'tipo',
        'nome_fantasia',
        'razao_social',
        'grupo',
        'cnpj',
        'inscricao_municipal',
        'inscricao_estadual',
        'ccm',
        'cnae',
        'naics',
        'duns',
        'nome',
        'data_nascimento',
        'nome_social',
        'sexo',
        'genero',
        'cpf',
        'rg',
        'titulo_eleitor',
        'cartao_sus',
        'carteira_trabalho',
        'cnh',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade_id',
        'estado_id',
        'conta_bancaria',
        'metodo_pagamento',
        'especificacao_pagamento',
        'plano_pagamento',
        'desconto',
        'dia_pagamento',
        'ativo',
        'estrangeiro',
        'cod_internacional',
        'moeda',
        'representante',
        'telefone_principal',
        'email_principal',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'fornecedores';

    protected $appends = [
        'fornecedor_nome',
        'fornecedor_documento',
    ];
    protected $casts = [
        'data_nascimento' => 'date',
        'representante' => 'json'
    ];

    function getFornecedorDocumentoAttribute()
    {
        if($this->tipo == TipoFornecedor::PJ()){
            return cnpj_format($this->cnpj);
        }
        return cpf_format($this->cpf);
    }
    function getFornecedorNomeAttribute()
    {
        if($this->tipo == TipoFornecedor::PJ()){
            return $this->nome_fantasia;
        }
        return $this->nome;
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function equipamentos()
    {
        return $this->hasMany(Equipamento::class);
    }
}
