<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $table = 'entries';

    protected $fillable = [
        'station_id',
        'temperature',
        'humidity',
        'dew_point',
        'pressure',
        'wind_speed',
        'wind_direction',
        'wind_gust',
    ];
}
