<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 */
class Event extends Model
{
    protected $table = 'events';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'from',
        'to',
        'images',
        'location_id'
    ];

    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo('App\Model\Location');
    }

}