<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 */
class Item extends Model
{
    protected $table = 'items';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description'
    ];

    protected $guarded = [];

        
}