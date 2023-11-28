<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamento extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'categoria',
        'descricao',
        'gestor_id',
        'responsavel_id',
        'empresa_id',
    ];

    protected $searchableFields = ['*'];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }

    public function responsavel()
    {
        return $this->belongsTo(Funcionario::class, 'responsavel_id');
    }

    public function gestor()
    {
        return $this->belongsTo(Funcionario::class, 'gestor_id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function centroCustoEmpresas()
    {
        return $this->belongsToMany(CentroCustoEmpresa::class);
    }
}
