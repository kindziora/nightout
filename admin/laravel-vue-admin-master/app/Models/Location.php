<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 */
class Location extends Model
{
    protected $table = 'locations';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'images',
        'creator_id',
        'long',
        'lat',
        'address'
    ];

    protected $guarded = [];


    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'id', 'creator_id');
    }

    public function events(){
        return $this->hasMany('App\Models\Event', 'location_id', 'id');
    }
}