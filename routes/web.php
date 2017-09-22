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

Route::get('/', 'HomeController@frontend')->name('root');
Route::get('/home', 'HomeController@backend')->name('home');

Route::get('/account', 'AccountController@index')->name('account.settings');

Route::post('/create/key', 'ApiKeyController@create')->name('api.key.create');
Route::get('/delete/key/{id}', 'ApiKeyController@destroy')->name('api.key.delete');