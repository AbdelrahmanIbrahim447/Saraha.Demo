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
Route::get('messages/{name}/{id}','messagesController@send_message');
Route::post('messages/{name}/{id}','messagesController@recive_message');
Route::any('delete/{id}','messagesController@delete');
Route::get('setting','SettingsController@index');
Route::post('setting/update/{id}','SettingsController@update');
Route::post('setting/update_password/{id}','SettingsController@update_password');
Route::post('setting/status/{id}','SettingsController@status');
