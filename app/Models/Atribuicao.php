<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atribuicao extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['nome'];

    protected $searchableFields = ['*'];

    protected $table = 'atribuicoes';

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }
}
