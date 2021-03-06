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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/weather', 'WeatherController@index')->name('weather');

Route::prefix('reviews')->group(function () {
    Route::get('/', 'ReviewController@index');
    Route::post('/', 'ReviewController@store');
    Route::get('form', 'ReviewController@getForm');
});


