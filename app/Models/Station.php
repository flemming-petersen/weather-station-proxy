<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Station extends Model
{
    use HasFactory;

    protected $table = 'stations';

    protected $fillable = [
        'public_name',
        'alias',
        'secret',
        'latitude',
        'longitude',
        'description',
        'windguru_uid',
        'windguru_salt',
        'windguru_paddword',
        'windguru_url',
        'windy_station_id',
        'windy_key',
        'windy_url',
    ];

    public function entries(): Relation
    {
        return $this->hasMany(Entry::class);
    }
}
