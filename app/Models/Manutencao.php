<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Manutencao extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tipo_manutencao',
        'descricao',
        'responsavel_id',
        'tecnico',
        'contato_tecnico',
        'equipamento_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'manutencoes';

    public function equipamento()
    {
        return $this->belongsTo(Equipamento::class);
    }
    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class,'responsavel_id');
    }
}
