<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 */
class Event extends ValidationModel
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
    
    public static $messages = [
      'required' => ':attribute ist erforderlich.'
    ];
    
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'from' => 'required',
        'to' => 'required',
        'images' => 'required',
        'location_id' => 'required'
    ];
    
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

}