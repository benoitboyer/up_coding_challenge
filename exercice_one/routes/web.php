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


Route::get('/', 'WelcomeController@getIndex');
Route::get('/closest-owner','OwnersController@getClosestOwner')->name('get-closest');
Route::post('/create-motorbike','MotorbikesController@createMotorbike');
Route::post('/create-owner','OwnersController@createOwner');

