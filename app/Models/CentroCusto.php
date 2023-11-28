<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CentroCusto extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nome'];

    protected $searchableFields = ['*'];

    protected $table = 'centro_custos';


    public function departamentos()
    {
        return $this->belongsToMany(Departamento::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
