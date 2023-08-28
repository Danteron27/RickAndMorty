<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'air_date',
        'episode',
        'characters_id',
        'url'
    ];

    public function getCharactersIdsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    public function characters()
    {
        return $this->hasMany(Character::class, 'id', 'characters_ids');
    }
}
