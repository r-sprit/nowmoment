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
Route::get("/sample", "HomeController@sample");

Route::get('/datapoints', 'HomeController@datapoints')->name("datapoints");
Route::get("/liveweather", "WeatherDataController@getLatestData")->name("liveweather");
Route::post("/addevent", "EventController@add")->name("addevent");
Route::get("/addevent", "EventController@add");
Route::get("/getevents", "EventController@get")->name("getevents");
Route::get("/healthfacilities", "HomeController@healthfacilities");
Route::get("/campingfacilities", "HomeController@campingfacilities");
Route::get("/bicyclerental", "HomeController@bicyclerental");
Route::get("/touristsites", "HomeController@touristsitesInfo");
Route::get("/civildefence", "HomeController@civildefencefacilities");

Route::get("/getcities", "UtilitiesController@getcities");
Auth::routes();

$this->get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
