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

//Base
Route::get('home','UserController@home');

// For testing anything new for the app
Route::get('test', 'TestController@rudy');



//$auth Users = users who are logged in
Route::resource('user', 'UserController',
                ['except' => ['create','edit']]);

// Images Routes
Route::post('images/{user}/upload', ['as'=>'user.images', 'uses'=>'UserController@upload']);
Route::post('images/{user}/dpUpload', 'UserController@dp');


Route::resource('settings', 'SettingsController',
                ['only' => ['edit', 'update']]);


// To be Developed and Researched
Route::resource('favs', 'FavController');


// To be developed and researched
Route::resource('message','MessageController');


// To be Developed
Route::resource('extras', 'ExtraController');

// For Guest Users
Route::get('/', 'WelcomeController@index');
Route::controllers([
        'password' => 'Auth\PasswordController',
	'/' => 'Auth\AuthController'
]);


//Route::resource('Photo', 'UserController');


