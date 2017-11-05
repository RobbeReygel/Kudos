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

Route::get('/', 'HomeController@index')->name('home');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('/callback/facebook', 'Auth\LoginController@callbackFacebook');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/user/{user_id}', 'UserController@view');

Route::get('/compliments/received', 'ComplimentController@received')->name('compliments.received');
Route::get('/compliments/given', 'ComplimentController@given')->name('compliments.given');
Route::post('/compliments/give', 'ComplimentController@giveCompliment')->name('compliments.give');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});
