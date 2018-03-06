<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::middleware('auth:api')->get('/user', function (Request $request) {
     
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
  
    //locations
    Route::get('locations/list', 'LocationsController@list');

    Route::get('locations/list/{country?}/{city?}/{user?}', 'LocationsController@list');
    
    Route::post('location/create', 'LocationsController@store');
    Route::post('location/update/{id}', 'LocationsController@update');
    Route::post('location/remove/{id}', 'LocationsController@destroy');

    //events
    Route::post('event/create', 'EventsController@store');
    Route::get('events/list', 'EventsController@list');
    Route::get('event/{id}', 'EventsController@view');

     //promotions
    Route::post('promotion/create', 'PromotionsController@store');
    Route::get('promotions/list', 'PromotionsController@list');
    Route::get('promotion/{id}', 'PromotionsController@view');
    
    // image uploads
    Route::post('resizeImagePost', ['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);
    Route::post('image/upload', ['as'=>'upload','uses'=>'ImageController@upload']);
    Route::get('image/get', ['as'=>'get','uses'=>'ImageController@get']);

    
});
