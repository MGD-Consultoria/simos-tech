<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorReport extends Model
{
    protected $table = 'sensor_reports';
    protected $fillable = ['sensor_id','valor'];

    function sensor()
    {
        return $this->belongsTo(Sensor::class,'sensor_id');
    }
}
