<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'nome_fantasia',
        'razao_social',
        'cnpj',
        'inscricao_municipal',
        'inscricao_estadual',
        'cnae',
        'ccm',
        'naics',
        'duns',
        'representante',
        'telefone_principal_empresa',
        'email_principal_empresa',
        'logo',
        'logo_relatorio',
        'cod_internacional',
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'estado_id',
        'cidade_id',
        'empresa_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'representante'=>'json'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function filial()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function empresaAnexos()
    {
        return $this->hasMany(EmpresaAnexo::class);
    }

    public function departamentos()
    {
        return $this->hasMany(Departamento::class);
    }

    public function centroCusto()
    {
        return $this->hasMany(CentroCusto::class);
    }
}
