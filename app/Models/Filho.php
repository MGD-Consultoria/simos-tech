<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filho extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'data_nascimento', 'funcionario_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
