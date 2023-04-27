<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Entry;

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
    ];

    public function entries(): Relation
    {
        return $this->hasMany(Entry::class);
    }
}
