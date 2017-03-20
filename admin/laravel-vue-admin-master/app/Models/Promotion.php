<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Promotion
 */
class Promotion extends Model
{
    protected $table = 'promotions';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'type',
        'images',
        'event_id'
    ];

    protected $guarded = [];


    public function codes(){
        return $this->hasMany('App\Model\Code');
    }

    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }       
}