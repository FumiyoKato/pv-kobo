<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForecastUnit extends Model
{
    use HasFactory;

    protected $table = 'forecast_units';

    protected $fillable = [
        'forecast_unit_name',
        'user_id',
        'pv_capacity',
        'pcs_capacity',
        'pcs_efficiency',
        'loss_rate',
        'direction',
        'angle',
        'latitude',
        'longitude',
        'start_at',
        'end_at',
    ];
}