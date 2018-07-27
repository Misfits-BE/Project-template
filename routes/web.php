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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Account routes
Route::get('/account/info', 'Account\InformationSettingsController@index')->name('account.info');
Route::patch('/account/info' , 'Account\InformationSettingsController@update')->name('account.info.update');
Route::get('/account/security', 'Account\SecuritySettingsController@index')->name('account.security');
Route::patch('account/security', 'Account\SecuritySettingsController@update')->name('account.security.update');

// Users Route
Route::get('/users', 'Users\UsersController@index')->name('users.index');