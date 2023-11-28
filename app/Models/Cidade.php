<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cidade extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'ibge', 'estado_id'];

    protected $searchableFields = ['*'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function fornecedores()
    {
        return $this->hasMany(Fornecedor::class);
    }
}
