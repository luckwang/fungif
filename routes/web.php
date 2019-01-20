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

Auth::routes();

Route::get('/', 'GifsController@index')->name('root');
Route::resource('gifs', 'GifsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::post('gifs/{gif}/score', 'GifsController@storeScore')->name('gif.score');

Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
Route::resource('tags', 'TagsController', ['only' => ['index', 'store', 'destroy']]);

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
