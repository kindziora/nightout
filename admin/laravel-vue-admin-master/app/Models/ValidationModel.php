<?php

namespace App\Models;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 */
class ValidationModel extends Model
{
    public static $messages = [
        /*  'required' => 'Das :attribute ist erforderlich.',
        'min' => 'Mindestens :min Zeichen angeben.',
        'max' => 'Maximal :max Zeichen erlaubt.',
        'unique' => ':attribute schon vergeben.',
        'confirmed' => 'Passwort stimmt nicht überein.'*/
    ];
    
    public static $rules =[
      /*  'name' => 'required|max:255|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',*/
    ];
    
    public static function validate($data) {
        return Validator::make($data, static::$rules, static::$messages);
    }

}