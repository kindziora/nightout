<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Code
 */
class Code extends Model
{
    protected $table = 'codes';

    public $timestamps = true;

    protected $fillable = [
        'value',
        'used',
        'valid',
        'promotion_id'
    ];

    protected $guarded = [];

    public function promotion()
    {
        return $this->hasOne('App\Models\Promotion');
    }
 
}