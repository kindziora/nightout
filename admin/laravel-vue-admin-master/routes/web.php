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
   
Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', 'AdminController@index')->name('root');
    Route::get('/home', 'AdminController@index')->name('root');
    
    //user
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('/test', function () {
        var_dump("debug_print_backtrace()");
    });
    
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
    Route::get('resizeImage', 'ImageController@resizeImage');
    Route::post('resizeImagePost', ['as'=>'resizeImagePost','uses'=>'ImageController@resizeImagePost']);
    


});
