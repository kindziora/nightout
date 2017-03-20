<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Signin
 */
class Signin extends Model
{
    protected $table = 'signins';

    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'user_id',
        'checkin_at',
        'validated_by_user_id',
        'promotion_code_id'
    ];

    protected $guarded = [];

    public function code(){
        return $this->hasOne('App\Model\Code', 'id', 'promotion_code_id');
    }

    public function validator()
    {
        return $this->hasOne('App\Model\User', 'id', 'validated_by_user_id');
    }    

    public function consumer()
    {
        return $this->hasOne('App\Model\User', 'id', 'user_id');
    } 

    public function event()
    {
        return $this->hasOne('App\Model\Event');
    } 
}