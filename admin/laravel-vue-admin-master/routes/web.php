<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
   
Route::group(['middleware' => ['web']], function(){
    
    Route::get('/', 'AdminController@index')->name('root');

    Route::get('/test', function(){
    var_dump("debug_print_backtrace()");

    });
    
    //locations
    Route::get('locations/list', 'LocationsController@list');

    Route::get('locations/list/{country?}/{city?}/{user?}', 'LocationsController@list');
    
    Route::get('locations/store', 'LocationsController@store');
    Route::get('locations/update/{id}', 'LocationsController@update');
    Route::get('locations/remove/{id}', 'LocationsController@destroy');
    
    


});
