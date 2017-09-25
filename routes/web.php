<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor");

Route::get('/datapoints', 'HomeController@datapoints')->name("datapoints");
Route::get("/liveweather", "WeatherDataController@getLatestData")->name("liveweather");
Route::post("/addevent", "EventController@add")->name("addevent");
Route::get("/addevent", "EventController@add");
Route::get("/getevents", "EventController@get")->name("getevents");
Route::get("/healthfacilities", "HomeController@healthfacilities");
Auth::routes();

$this->get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
