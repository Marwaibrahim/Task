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


    Route::get('tickets','API\TicketsAPIController@index');
    Route::get('ticket/{id}/update','API\TicketsAPIController@update');
    Route::delete('ticket/{id}/delete','API\TicketsAPIController@destroy');


