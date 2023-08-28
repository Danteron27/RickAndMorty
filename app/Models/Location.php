<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'dimension',
        'residents_ids',
        'url'
    ];

    public function getResidentsIdsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    public function residents()
    {
        return $this->hasMany(Character::class, 'location_id');
    }
}
