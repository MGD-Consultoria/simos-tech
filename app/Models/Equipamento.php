<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipamento extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'numero_serie',
        'nome',
        'categoria_id',
        'fabricante',
        'ano_fabricacao',
        'capacidade_desempenho',
        'condicao_atual',
        'observacao',
        'data_compra',
        'data_instalacao',
        'ultima_manutencao',
        'periodicidade_manutencao',
        'garantia',
        'localizacao_setor',
        'latitude',
        'longitude',
        'responsavel_id',
        'fornecedor_id',
        'especificacoes_tecnicas'
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'data_compra' => 'date',
        'data_instalacao' => 'date',
        'ultima_manutencao' => 'date',
    ];
    public function manutencoes()
    {
        return $this->hasMany(Manutencao::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'responsavel_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class,'fornecedor_id');
    }

    public function categoria()
    {
        return $this->belongsTo(EquipamentoCategoria::class,'categoria_id');
    }

    public function sensores()
    {
        return $this->hasMany(Sensor::class);
    }

    public function normas()
    {
        return $this->belongsToMany(Norma::class);
    }
}
