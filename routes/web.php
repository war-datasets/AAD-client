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

// Authencation routes
Auth::routes();

// Home routes
Route::get('/', 'HomeController@frontend')->name('root');
Route::get('/home', 'HomeController@backend')->name('home');

// Account routes
Route::get('/account', 'AccountController@index')->name('account.settings');
Route::post('/account/info', 'AccountController@updateInfo')->name('account.settings.info');

// API access tokens
Route::post('/create/key', 'ApiKeyController@create')->name('api.key.create');
Route::get('/delete/key/{id}', 'ApiKeyController@destroy')->name('api.key.delete');

// Notifications
Route::get('notifications', ['as' => 'notifications', 'uses' => 'NotificationController@index']);
Route::get('notifications/markall', ['as' => 'notifications.read.all', 'uses' => 'NotificationController@markAllAsRead']);

// News routes
Route::get('news', 'NewsController@index')->name('news.index');
Route::get('news/create', 'NewsController@create')->name('news.create');