<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpresaAnexo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome', 'descricao', 'link', 'tipo', 'empresa_id','arquivo'];

    protected $searchableFields = ['*'];

    protected $table = 'empresa_anexos';

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
