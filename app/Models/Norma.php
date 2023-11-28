<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Norma extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'titulo',
        'sigla',
        'descricao',
        'data_vigencia',
        'unidade_medida',
        'escala_permitida_inicial',
        'escala_permitida_final',
        'escala_minima_bom',
        'escala_maxima_bom',
        'escala_minima_regular',
        'escala_maxima_regular',
        'escala_minima_irregular',
        'escala_maxima_irregular',
        'revisao',
        'orgao_regulador'
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'data_vigencia' => 'date',
    ];

    public function equipamentos()
    {
        return $this->belongsToMany(Equipamento::class);
    }

    public function parametros()
    {
        return $this->belongsToMany(Parametro::class);
    }
}
