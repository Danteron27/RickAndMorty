<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Character extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 
        'location_id', 
        'origin_id', 
        'status', 
        'species',
        'Type', 
        'gender', 
        'image', 
        'url'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class, 'origin_id');
    }

}