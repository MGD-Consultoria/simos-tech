<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tipo',
        'modelo',
        'data_fabricacao',
        'fabricante',
        'faixa_medicao_inicial',
        'faixa_medicao_final',
        'equipamento_id',
        'latitude',
        'logintude',
        'frequencia_leitura_dados',
        'unidade_medida',
        'codigo_identificacao'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'sensores';

    protected $casts = [
        'data_fabricacao' => 'date',
    ];

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
}
