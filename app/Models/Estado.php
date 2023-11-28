<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estado extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'uf', 'ddd', 'ibge'];

    protected $searchableFields = ['*'];

    public function cidades()
    {
        return $this->hasMany(Cidade::class);
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
