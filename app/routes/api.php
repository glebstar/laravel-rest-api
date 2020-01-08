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

Route::namespace('Api')->group(function () {
    Route::get('/data', 'UserDataController@index');
    Route::post('/data', 'UserDataController@store');
    Route::put('/data/{userData}', 'UserDataController@update');
    Route::delete('/data/{userData}', 'UserDataController@destroy');
});
