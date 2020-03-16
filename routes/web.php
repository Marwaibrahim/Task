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

Route::get('/', function () {
    return view('welcome');
});

Route::post("/tickets","TicketsController@create");
Route::get("/ticket/create","TicketsController@create");

Route::post("/ticket/store","TicketsController@store");
Route::get("/ticket/{id}/show","TicketsController@show");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {

    Route::get("/tickets/{id}/edit","TicketsController@edit");
    Route::patch("/tickets/{id}","TicketsController@update");
    Route::get("/tickets","TicketsController@index");
    Route::delete("/ticket/{id}/delete","TicketsController@destroy");
});



