<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentoCategoria extends Model
{
    protected $fillable = ['nome'];
    protected $table = 'equipamento_categoria';
}
