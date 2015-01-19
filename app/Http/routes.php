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

Route::get('/', 'WelcomeController@index');

Route::resource('users', 'UsersController');



Route::get('periods', [
    'as' => 'periods.index',
    'uses' => 'PeriodsController@index'
]);

Route::get('periods/create', [
    'as' => 'periods.create',
    'uses' => 'PeriodsController@create'
]);

Route::post('periods',[
    'as' => 'periods.store',
    'uses' => 'PeriodsController@store'
]);
