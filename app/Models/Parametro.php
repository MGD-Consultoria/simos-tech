<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parametro extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nome',
        'unidade_medida',
        'escala_permitida_inicial',
        'escala_permitida_final',
    ];

    protected $searchableFields = ['*'];

    public function normas()
    {
        return $this->belongsToMany(Norma::class);
    }
}
