<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return "Test";
});

Route::get('/user', 'UserController@index');
Route::get('/user/{id}','UserController@show')->where('id', '[0-9]+');
Route::get('/user/create','UserController@create');
Route::get('/user/{id}/delete','UserController@destory');
Route::get('/user/{id}/edit','UserController@edit');
Route::post('/user/{id}/update','UserController@update');
Route::post('/user/store','UserController@store');