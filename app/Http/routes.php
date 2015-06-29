<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
/* Custom Controllers */
Route::resource('user', 'UserController');
//Route::get('user/{id}', 'UserController@index');
Route::resource('profile', 'ProfileController');
Route::resource('contact', 'ContactController');
Route::resource('reminder', 'ReminderController');
Route::resource('subscription', 'SubscriptionController');
Route::resource('senderid', 'SenderIdController');

/* Custom Controllers Code Block End*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
