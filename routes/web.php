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

// Welcome routes
Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Account routes - TODO: needs testing
Route::get('/account/info', 'Account\InformationSettingsController@index')->name('account.info');
Route::patch('/account/info' , 'Account\InformationSettingsController@update')->name('account.info.update');
Route::get('/account/security', 'Account\SecuritySettingsController@index')->name('account.security');
Route::patch('account/security', 'Account\SecuritySettingsController@update')->name('account.security.update');

// Users Route - TODO: needs testing
Route::get('/users', 'Users\UsersController@index')->name('users.index');
Route::get('/users/create', 'Users\UsersController@create')->name('users.create');
Route::get('/users/delete/{user}', 'Users\UsersController@destroy')->name('users.delete');
Route::delete('/users/delete/{user}', 'Users\UsersController@destroy')->name('users.destroy');
Route::get('/users/delete/undo/{user}', 'Users\DestroyController@undo')->name('users.delete.undo');
Route::post('/users/store', 'Users\UsersController@store')->name('users.store');
Route::get('/users/search', 'Users\UsersController@search')->name('users.search');

// User activation/deactivation routes - TODO: needs testing
Route::get('/users/deactivate/{user}', 'Users\ActiveStateController@create')->name('users.deactivate');
Route::get('/users/activate/{user}', 'Users\ActiveStateController@destroy')->name('users.activate');
Route::post('/users/deactivate/{user}', 'Users\ActiveStateController@store')->name('users.deactivate.store');

// Activity overview logs - TODO: needs testing
Route::get('/activities', 'ActivityLogs\IndexController@index')->name('activities.index');
Route::get('/activities/search', 'ActivityLogs\IndexController@search')->name('activities.search');

// Page fragment routes - TODO: needs testing
Route::get('/fragments/status/{fragment}/{status}', 'Fragments\IndexController@status')->name('fragments.status');
Route::get('/fragments/edit/{fragment}', 'Fragments\IndexController@edit')->name('fragments.edit');
Route::patch('/fragments/edit/{fragment}', 'Fragments\IndexController@update')->name('fragments.update');
Route::get('/fragments/search', 'Fragments\IndexController@search')->name('fragments.search');
Route::get('/fragments', 'Fragments\IndexController@index')->name('fragments.index');