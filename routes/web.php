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
//route search 
Route::get('/search',['uses' => 'RideController@Search','as' => 'search']);

Route::get('/{ride}',['uses' => 'RideController@student','as' => 'student.show']);
Route::post('/search', 'RideController@index')->name('searchRideForm');
