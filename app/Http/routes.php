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

// For testing anything new for the app
Route::get('test', 'TestController@rudy');



//$auth Users = users who are logged in 
Route::resource('user', 'UserController', 
                ['except' => ['create','edit']]);

Route::resource('settings', 'SettingsController',
                ['only' => ['edit', 'update']]);


Route::get('home','UserController@home');


// To be Developed and Researched
Route::get('favs', function(){
    return 'This is favs';
});


// To be developed and researched
Route::get('message','UserController@t');


// To be Developed
Route::get('extras', function(){
        return 'The is Extras';
});

// For Guest Users
Route::get('/', 'WelcomeController@index');
Route::controllers([
        'password' => 'Auth\PasswordController',
	'/' => 'Auth\AuthController'
]);


//Route::resource('Photo', 'UserController');


