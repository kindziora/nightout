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
        'lat'
    ];

    protected $guarded = [];


    public function creator()
    {
        return $this->belongsTo('App\Model\User', 'id', 'creator_id');
    }

    public function events(){
        return $this->hasMany('App\Model\Event', 'location_id', 'id');
    }
}