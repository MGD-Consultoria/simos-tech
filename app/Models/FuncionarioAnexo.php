<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FuncionarioAnexo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'arquivo', 'funcionario_id'];

    protected $searchableFields = ['*'];

    protected $table = 'funcionario_anexos';

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
