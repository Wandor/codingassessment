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
    return view('search');
});
//route search
Route::get('/search', 'RideController@doSearch')->name('search');

// Route::resource('/results', 'RideController');
Route::get('/results', 'RideController@results');
Route::get('result/{id}', 'RideController@details');

