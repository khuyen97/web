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

Route::get('/', [
    'as'   => 'app.index',
    'uses' => 'AppController@index'
]);

Route::post('/', [
    'as'   => 'ndvt.store',
    'uses' => 'AppController@store'
]);

Route::delete('/{id}', [
    'as'   => 'ndvt.destroy',
    'uses' => 'AppController@destroy'
]);

Route::post('/{id}/{nd}/{vt}/{nc}', [
    'as'   => 'ndvt.edit',
    'uses' => 'AppController@edit'
]);
